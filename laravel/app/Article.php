<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $fillable = ['title', 'body', 'excerpt'];
    protected $guarded  = [];

    public function path()
    {
        return route('articles.show', $this);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
