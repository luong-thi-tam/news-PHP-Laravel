<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'content', 'image'];

    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorites']);
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'news_id', 'user_id')
                    ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
