<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// snake case, plural name  class(BookRequest)-->Table name(book_requests)
class BookRequest extends Model
{
    //For mass-assignment data to table
    protected $fillable = [
        'contact_name',
        'mobile',
        'email',
        'book_name',
        'pickup_date'
    ];
}
