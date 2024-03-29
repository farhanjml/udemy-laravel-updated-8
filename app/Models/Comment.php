<?php

namespace App\Models;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;


class Comment extends Model
{
    use HasFactory, SoftDeletes, Taggable;

    protected $fillable = ['user_id', 'content'];

    // The attributes that should be hidden for arrays.
    protected $hidden = [ 
        'commentable_type',
        'deleted_at',
        'commentable_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

//    public function tags()
//    {
//        return $this->morphToMany('App\Models\Tag', 'taggable')->withTimestamps();
//    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

//  Can remove all of this because of the CommentObserver.php
//    public static function boot()
//    {
//        parent::boot();
//
//        static::creating(function (Comment $comment) {
//            // dump($comment);
//            // dd(BlogPost::class);
//            if ($comment->commentable_type === BlogPost::class) {
//                Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
//                Cache::tags(['blog-post'])->forget('mostCommented');
//            }
//        });
//
//        // static::addGlobalScope(new LatestScope);
//    }
}
