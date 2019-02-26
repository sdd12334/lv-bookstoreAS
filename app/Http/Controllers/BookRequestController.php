<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookRequest;
use App\Http\Requests\BookRequestFormRequest;

class BookRequestController extends Controller
{
    
    //Show the form for inserting data
    public function create()
    {
        return view('contact.create');// View file:resources\views\contact\create.blade.php
    }

    //Store insert data to table book_requests
    public function store(BookRequestFormRequest $request)//Use FormRequest for validation
    {   
        
        //Store validated records in $book_requests
        $book_requests = new BookRequest([
            'contact_name'=>$request->get('contact_name'),
            'mobile'=>$request->get('mobile'),
            'email'=>$request->get('email'),
            'book_name'=>$request->get('book_name'),
            'pickup_date'=>$request->get('pickup_date')
        ]);
        //Inserte records into the database
        $book_requests->save();
        //Pass success info to redirect page
        return redirect('/books')->with('success', 'Order request has been added');
        
        
        
            
    }
}
