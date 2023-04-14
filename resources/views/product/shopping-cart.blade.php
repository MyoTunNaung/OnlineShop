@extends('layouts.app')
@section('content')

<!-- Shopping Cart -->
<div class="container">

@if(Session::has('cart'))
<div class="row text-center">
<div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3" style="overflow-x:auto;">				


		<table class="table table-hover">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>					
				<th>Unit Price</th>
				<th class="text-center" colspan="3">Qty</th>
				<th>Amount</th>					
				<th>Status</th>
			</tr>
			@foreach($products as $product)	

						<?php 
								$p_id 	= 	$product['item']['id'];
						 ?>				

			<tr>
						<td>{{ $product['item']['id'] }} </td>								

						<td>{{ $product['item']['name_eng'] }} </td>					

						<td class="text-right">{{ $product['item']['price'] }} MMK</td>

						<td>
							<a href="{{ url("/product/subToCart/{$p_id}") }}" class="btn btn-outline-primary"> 
							- 
							</a>
						</td>
						
						<td> 
							<input type="text" name="qty" disabled value="{{ $product['qty'] }}" style="width: 80px; text-align: center;"> 
						</td>

						<td>
							<a href="{{ url("/product/addToCart/{$p_id}") }}" class="btn btn-outline-primary">
							 + 
							</a>
						</td>						

						<td class="text-right">{{ number_format($product['item']['price'] * $product['qty']) }} MMK
						</td>

						<td>
							<a href="{{ url("/product/removeFromCart/{$p_id}") }}" class="btn btn-outline-primary"> Remove </a>
						</td>

					</tr>
					@endforeach
					<tr>
						<td colspan="3">TOTAL</td>
						<td colspan="3">
							<b>{{ $totalQty }}</b>
						</td>
						<td class="text-right ">
							<b>{{ number_format($totalPrice) }} MMK</b>
						</td>						
						<td></td>
					</tr>
				</table>

				
	</div> <!-- Col -->
	</div> <!-- Row -->
	
	<br>
	
	<div class="row">

			<div class="col-sm-4 col-md-4 col-md-offset-3 col-sm-offset-3">

					<a href="{{ url("/") }}" type="button" class="btn btn-outline-primary text-center" style="width: 100%">
						Continue Shopping
					</a>
			</div>

			<div class="col-sm-4 col-md-4 col-md-offset-3 col-sm-offset-3">
					<a href="{{ url("/product/clearCart") }}" type="button" class="btn btn-outline-primary text-center" style="width: 100%">
						Clear Cart
					</a>
			</div>

			<div class="col-sm-4 col-md-4 col-md-offset-3 col-sm-offset-3">
					<a href="{{ url("/order") }}" type="button" class="btn btn-outline-primary text-center" style="width: 100%">
						Order
					</a>
			</div>

	</div> <!-- Row -->

	@else
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img style="width: 300px;height: 150px;" src="{{ asset("/images/emptycart.jpg") }}" class="card-img-top" >
				<h4>!!! No items in Cart !!!</h4>
	</div>
	</div>
	@endif
	
</div>

<!-- Shopping Cart -->

@endsection