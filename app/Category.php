<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany('App\Book',  'book_category', 'book_id', 'category_id')
                        ->using('App\BookCategory');
    }
}
