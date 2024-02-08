<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "id";
    protected $fillable = ['title', 'content'];

    /**
     * Get the image associated with the post.
     */
    public function image()
    {
        return $this->hasOne(Image::class, 'post_id', $this->primaryKey);
    }

    /**
     * The tags that belong to the post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get artist though image
     */
    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }
}
