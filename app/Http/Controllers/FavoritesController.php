<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($id)
    {
        $news = News::findOrFail($id);
        auth()->user()->favorite($news->id);
        return back();
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        auth()->user()->unfavorite($news->id);
        return back();
    }
}
