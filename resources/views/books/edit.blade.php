@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="title">
    Edit the Book
</div>
<div class="message">
	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
</div>
    <form method="post" action="{{ route('books.update', $book->id) }}">
        @method('PATCH')
        @csrf
		<table class="table table-striped">
		<tbody>
		<tr>
			<td><label for="name" >Book Name</label></td>
			<td><input name="name" type="text" value="{{ $book->name }}" class="form-control" /></td>
		</tr>
        <tr>
			<td><label for="name" >Book Author</label></td>
			<td><input name="author" type="text" value="{{ $book->author }}" class="form-control"/></td>
		</tr>
		<tr>
			<td><label for="name" >Book Price</label></td>
			<td><input name="price" type="text" value="{{ $book->price }}" class="form-control"/></td>
		</tr>
        <tr>
			<td><label for="name" >Book Image</label></td>
			<td><input name="image_url" type="text" value="{{ $book->image_url }}" class="form-control"/></td>
		</tr>
		 <tr><td></td><td><button type="submit">Update</button></td></tr>
        </tbody>
		</table>
    </form>

@endsection