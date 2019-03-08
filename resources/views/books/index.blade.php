
@extends('layout')

@section('content')
<h3>Book List</h3>
    <div class="line"></div>
    <aside>
      <img id="search-icon" src="/images/search.png" alt="!"/>
      Search Box: <input type="text" name="search" id="search" placeholder="Please input Book Name or Author"/>
    </aside>
    <div class="line"></div>
    <div class="uper">

      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
      @endif
      
      <table id="table-striped" class="table table-striped tablesorter">
        <thead>
          <tr>
            <td>ID</td>
            <td>Book Name</td>
            <td>Book Author</td>
            <td>Book Price</td>
            <td>Publisher</td>
            <td class="bookImg">Book Image</td>
          </tr>
        </thead>
        <tbody id="books-table">
          <!-- get books information -->
          @foreach($books as $book)
            <tr>
              <td><a href="{{ route('books.show',$book->id)}}">{{$book->id}}</a></td>
              <td><a href="{{ route('books.show',$book->id)}}">{{$book->name}}</a></td>
              <td>{{$book->author}}</td>
              <td class="price">{{$book->price}}</td>
              <td>{{$book->publisher}}</td>
              <td class="td-img"><img class="thumbnail"src="{{$book->image_url}}"/></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <a href="#"> &uarr; GO UP &uarr;</a>
    <script>
      //search box js
      $('#search').on('keyup',function(){          // Attach an keyup event handler to #search
        $value=$(this).val();                      //get value in the search box
        $.ajax({                                   //jquery asynchronous HTTP request
          //async: false,                          // temporarily lock the browser, disabling any actions while the request is active.
          type : 'get',        
          url : '{{URL::to('search')}}',           //direct to a route with destination of 'search'  
          dataType:"json",           
          data:{'search':$value},        
          success:function(data){                  //function to be called if the request succeeds      
            $('#books-table').html(data.tbody);    //put json data in the table
            $("#table-striped").trigger("update"); //update table after ajax response arrived
          }        
        });                        
      });   

      //init jquery plugin tablesorter 
      $(function() {
        $("#table-striped").tablesorter();
      });   

      //pop up window
      $(function(){
        $(document).on("click",".thumbnail",function(){//.click() will invalid after ajax. Use .on()
          var src=$(this).attr("src");                 //get "src" of the clicked img
          $(".popupImg").attr("src",src )              //put clicked img's src to pop up img
          $(".pop-mask").fadeIn();                     //show pop up window
        });
      });

      //close pop up window
      $(function(){
        $(".pop-mask").click(function(){
          $(".pop-mask").fadeOut();             //close pop up window
          $(".popupImg").attr("src");           //remove picture src
        });
      });     
    </script>

    <!-- hidden pop up window -->
    <div class="pop-mask">   
      <!-- mask layer --> 
      <div class="img-mask">
        <img class="popupImg" src="/" alt="No Picture"/>
        <img class="close" src="/images/close.png"/> 
      </div>
    </div>
    

@endsection

@section('about')
<!--Auout the Bookstore-->
<div>
  <div class="line"></div>
  <table style="width:100%;"> 
      <!-- geAboutt bookstore information -->    
        <tr>        
          <td><p>Welcome to our online bookstore!</p>
              <p>We can search the books by Book Name or Author.</p>
          </td>
          <td style="text-align:right;"><img src="/images/reading.jpg" style="width:200px;"/></td>
        </tr>
  </table>
</div>

@endsection