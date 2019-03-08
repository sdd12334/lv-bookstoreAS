<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class SearchController extends Controller{
   
    public function index(){
        return view('search.search');
    }
 
 
 
    public function search(Request $request){
    
        if($request->ajax()){
            $output="";
            $search="";
            /*
            $title='<table id="table-striped" class="table table-striped tablesorter">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Book Name</td>
                            <td>Book Author</td>
                            <td>Book Price</td>
                            <td>Publisher</td>
                            <td class="bookImg">Book Image</td>
                        </tr>
                    </thead>';
            */
            
            $results=DB::table('books')// search in the book table
                        ->where('name','LIKE','%'.$request->search."%") //search book name in table
                        ->orWhere('author','LIKE','%'.$request->search."%")//or search author in table
                        ->get();// get search result
            if($results){
                //prepare AJAX response
                foreach ($results as $key => $book) {
                    $search.=
                        '<tr>'.
                            '<td><a href="/books/'.$book->id.'">'.$book->id.'</a></td>'.
                            '<td><a href="/books/'.$book->id.'">'.$book->name.'</td>'.
                            '<td>'.$book->author.'</td>'.
                            '<td class="price">'.$book->price.'</td>'.
                            '<td>'.$book->publisher.'</td>'.
                            '<td class="td-img">
                                    <img  class="thumbnail"  src="/images/books/'.$book->isbn.'-01.png" alt="no" />
                                </a>
                            </td>'.
                        '</tr>';

                } 
                $output=$search.'</table>';
                //AJAX response
                //return Response($output);
                return response()->json([    //返回 json数据
                    'tbody'=>$output
                ]);

            }
        }
    }
 
}