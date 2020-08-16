<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_author', 'book_id', 'author_id')
                        ->using('App\BookAuthor');
    }
}
