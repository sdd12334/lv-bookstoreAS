<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//snake case, plural name of the class(Book)-->table name(books)
class Book extends Model
{
    //For mass-assignment data to table
    protected $fillable = [
        'name',
        'author',
        'price',
        'image_url'
    ];
}
