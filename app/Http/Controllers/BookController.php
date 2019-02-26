<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Store all records(table books) into $books
        $books = Book::all();
        //Put $books data in an array and pass to 
		return view('books.index', compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $book = new Book;
        return view('books.create',compact('book'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'price'=>'required|integer',
            'image_url'=>'required'
        ]);
        //Insert new book to db
        $book = new Book([
            'name'=>$request->get('name'),
            'author'=>$request->get('author'),
            'price'=>$request->get('price'),
            'image_url'=>$request->get('image_url')
        ]);
        //
        $book->save();
        return redirect('/books')->with('success', 'Book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
		return view('books.show', compact('book'));
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
             //1. validate the inputted data 
		  $request->validate([
            'name'=>'required',
            'author'=> 'required',
            'price'=> 'required|integer',
            'image_url' => 'required'
            ]);
          
            //2. search the book from database
            $book = Book::find($id);
            
            //3. set the new values 
            $book->name = $request->get('name');
            $book->author = $request->get('author');
            $book->price = $request->get('price');
            $book->image_url = $request->get('image_url');
            
            //4. save the book into database
            $book->save();
   
             return redirect('/books')->with('success', 'Book has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
