<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'summary', 'cover', 'ISBN', 'publication_date', 'score',
    ];

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'book_author', 'book_id', 'author_id')
                        ->using('App\BookAuthor')
                        ->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'book_category', 'book_id', 'category_id')
                        ->using('App\BookCategory')
                        ->withTimestamps();
    }
}
