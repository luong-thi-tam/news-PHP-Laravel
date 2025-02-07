<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorites']);
    }

    public function favorites()
    {
        return $this->belongsToMany(News::class, 'favorites', 'user_id', 'news_id')
                    ->withTimestamps();
    }

    public function favorite($newsId)
    {
        if (!$this->isFavorited($newsId)) {
            $this->favorites()->attach($newsId);
        }
    }

    public function unfavorite($newsId)
    {
        if ($this->isFavorited($newsId)) {
            $this->favorites()->detach($newsId);
        }
    }

    public function isFavorited($newsId)
    {
        return $this->favorites()->where('news_id', $newsId)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
