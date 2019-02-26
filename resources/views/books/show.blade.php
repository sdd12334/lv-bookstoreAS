
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" /> 
<link rel="stylesheet" type="text/css" href="/css/product_info.css" /> 
<link rel="stylesheet" type="text/css" href="/css/960.css" /> 
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/slideshow.js"></script>
<script>	
$(document).ready(function() {
	// (a little sooner than page load)
	$('#extraInfo_Area').hide();
	$('a#extraInfo_link').click(function() {//Add click event handler
		$('#extraInfo_Area').toggle(300);//Display or hide the matched elements
		return false;
	});
});

//calculate currency value
function currency_translate2(){
	var currency=document.getElementById('currency_convert2');
	if(currency.value!="no"){
		var currency_value=currency.value;
		//Get Currency Type
		var code=currency_value.substring(currency_value.length-3,currency_value.length);
		//Get the Exchange Rate
		var currency=currency_value.substring(0,currency_value.length-4);
		var price_now=document.getElementById('newPrice_label');
		var HK_price=document.getElementById('HK_price');
		var final_price=currency*HK_price.value;
		price_now.innerHTML=code+'$'+final_price.toFixed(2); //Update the Price in another Currency
	}
}		
</script>
<div class="line"></div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <tbody>
			<tr>
				<td class="field">Name</td>
				<td class="value">{{ $book->name }}</td>
			</tr>	
			<tr>
				<td class="field">Author</td>
				<td class="value">{{ $book->author }}</td>
			</tr>	
			<tr>
				<td class="field">Publisher</td>
				<td class="value">{{ $book->publisher }}</td>
			</tr>
			<tr>
				<td class="field">ISBN</td>
				<td class="value">{{ $book->isbn }}</td>
			</tr>
			<tr>
				<td class="field">Price</td>
				<td class="value"><span id="newPrice_label">HKD${{ $book->price }}</span></td>
			</tr>
			<tr style="display:none;">
				<td class="field">&nbsp;</td>
				<td class="value">
					<select id="" name="" id="productInfo_currency_select"></select>
						<div id="">Exchange Rate is just for reference</div>
				</td>
			</tr>
			<tr>
				<td class="field">Exchange Rate Reference</td>
				<td class="value">
					<form id="productInfo_currency" action="{{ route('books.show',$book->id)}}">
						<INPUT type="hidden" id="HK_price" value="{{ $book->price }}"> 
						<select id="currency_convert2" name="currency_convert2" onchange="currency_translate2()" id="productInfo_currency_select">
							<option value="no" selected="selected">Exchange Rate</option>
							<option label="HKD" value="1.00000000HKD">HKD</option>
							<option label="USD" value="0.12840000USD">USD</option>
							<option label="RMB" value="0.89920002RMB">RMB</option>
							<option label="TWD" value="3.90300012TWD">TWD</option>
							<option label="JPY" value="13.17300034JPY">JPY</option>
							<option label="CAD" value="0.12909999CAD">CAD</option>
							<option label="EUR" value="0.08190000EUR">EUR</option>
						</select>
					</form>
				</td>
			</tr>
			<tr>
				<td class="field" colspan="2">
					<a href="javascript:;"  id="extraInfo_link"> 
						<IMG src="/images/extraInfo_arrow.gif" border="0" width="15" height="14" id="extraInfo_img">&nbsp; More information 
					</a>
				</td>
			</tr>	
			<tr id="extraInfo">
				<td class="value" colspan="2">
					<div id="extraInfo_Area" style="display: none; overflow: hidden;">
						<table id="extraInfo_table" cellpadding="0">			
							<tbody>
								<tr>
									<td class="field">Language</td>
									<td class="value">{{ $book->language }}</td>
								</tr>	
								<tr>
									<td class="field">Pages</td>
									<td class="value">{{ $book->pages }}</td>
								</tr>
								<tr>
									<td class="field">Edition</td>
									<td class="value">{{ $book->edition }}</td>
								</tr>
								<tr>
									<td class="field">Binding</td>
									<td class="value">{{ $book->binding }}</td>
								</tr>
								<tr>
									<td class="field">Description</td>
									<td class="value">{{ $book->description }}</td>
								</tr>
							</tbody>
						</table>	
					</div>
				</td>
			</tr> 
			<tr>
				<td class="productImg" rowspan="13" colspan="2" align="center">
					<div class="container_12" id="wrapper"> 
						<div class="grid_8" id="content">
							<div class="grid_6 prefix_1 suffix_1" id="gallery"> 
								<div id="pictures"> 
										<img src="/images/books/{{ $book->isbn}}-12.png" alt="No other image" /> 
										<img src="/images/books/{{ $book->isbn}}-11.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-10.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-09.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-08.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-07.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-06.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-05.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-04.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-03.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-02.png" alt="No other image" />
										<img src="/images/books/{{ $book->isbn}}-01.png" alt="No other image" />
								</div>
								<div class="grid_3 alpha" id="prev"> 
									<a href="#previous">&laquo; Previous page</a>  
								</div> 
								<div class="grid_3 omega" id="next"> 
									<a href="#next">Next page &raquo;</a> 
								</div> 
							</div>  
						</div> 
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<a class="back" href="{{ route('books.index') }}">BACK</a>
  </div>
@endsection