
@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
	}
	#datepicker{
		width:160px;
	}
</style>
<div class="title">
    Order New Book
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

<script>
	//init datepicker jquery plugin
	$( function() {
		$( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
	} );
	// Setter datepicker options
	$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
</script>
<!-- Use post method send user request-->
<form method="post" action="{{ route('contact.store') }}">
	<!--CSRF protection-->
	{{ csrf_field() }}
	<table class="table table-striped">
		<tbody>
			<tr>
				<td><label for="l-name" >Contact name</label></td>
				<td><input  id="l-name" name="contact_name" type="text" class="form-control"/></td>
			</tr>
			<tr>
				<td><label>Mobile</label></td>
				<td><input name="mobile" type="text" class="form-control"/></td>
			</tr>
			<tr>
				<td><label>E-mail</label></td>
				<td><input name="email" type="text" class="form-control"/></td>
			</tr>
			<tr>
				<td><label>Book name</label></td>
				<td><input name="book_name" type="text" class="form-control"/></td>
			</tr>
			<tr>
				<td><label>Pick up data</label></td>
				<td><input id="datepicker" name="pickup_date" type="text" class="form-control"/></td>
			</tr>
			<tr>
				<td></td>
				<td><button  id="submit-btn" type="submit">Submit</button></td>
			</tr>
		</tbody>
	</table>
</form>
@endsection