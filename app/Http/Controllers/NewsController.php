<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        if ($request->has('filter_date') && !empty($request->filter_date)) {
            switch ($request->filter_date) {
                case 'today':
                    $query->whereDate('created_at', Carbon::today());
                    break;
                case 'this_week':
                    $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
                    break;
                default:
                    break;
            }
        }

        $favorites = News::withCount('favorite_users')
            ->orderByDesc('favorite_users_count')
            ->take(3)
            ->get();

        $news = $query->latest()->paginate(4);

        return view('dashboard', [
            'news' => $news,
            'favorites' => $favorites,
        ]);
    }

    public function indexAdmin()
    {
        $news = News::orderBy('id', 'asc')->paginate(10);
        return view('admin', [
            'news' => $news,
        ]);
    }

    public function show($id)
    {
        // idの値でユーザーを検索して取得
        $user = \Auth::user();
        $news = News::findOrFail($id);
        $comments = $news->comments()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザー詳細ビューでそれを表示
        return view('news.show', [
            'news' => $news,
            'comments' => $comments,
            'user' => $user,
        ]);
    }

    public function showAdmin($id)
    {
        $news = News::findOrFail($id);
        $comments = $news->comments()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザー詳細ビューでそれを表示
        return view('admin.show', [
            'news' => $news,
        ]);
    }

    public function create()
    {
        $news = new News();

        return view('admin.create', [
            'news' => $news,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        $image = "";
        if($request->image){
            $image = $request->image;
        }

        News ::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'image' => $request->image, 
        ]);

        return redirect('/admin');
    }

    public function edit(string $id)
    {
        $news = News::findOrFail($id);

        return view('admin.edit', [
            'news' => $news,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'image' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
        $news = News::findOrFail($id);

            $news->update($validated);
            return redirect('/admin')
                ->with('success','Update Successful');
    }

    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        $news->delete();
        return redirect('/admin')
            ->with('success', 'Delete Successful');
    }


}
