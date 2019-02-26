
@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="title">
    Add a New Book
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
    <form method="post" action="{{ route('books.store') }}">

      <!--CSRF Protection-->
			{{ csrf_field() }}

			<table class="table table-striped">
				<tbody>
					<tr>
						<td><label for="l-name" >Book Name</label></td>
						<td><input  id="l-name" name="name" type="text" class="form-control"/></td>
					</tr>
					<tr>
						<td><label for="l-author" >Book Author</label></td>
						<td><input id="l-author" name="author" type="text" class="form-control"/></td>
					</tr>
					<tr>
						<td><label for="l-price" >Book Price</label></td>
						<td><input id="l-price" name="price" type="text" class="form-control"/></td>
					</tr>
					<tr>
						<td><label for="l-img" >Book Image</label></td>
						<td><input id="l-img" name="image_url" type="text" class="form-control"/></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit">Add</button></td>
					</tr>
				</tbody>
			</table>
    </form>
		<a class="back" href="{{ route('books.index') }}">BACK</a>
@endsection