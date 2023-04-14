@extends('layouts.app')
@section('content')

@include('language_search')

<?php 
		$lang = $_SESSION['lang'];
		$name = "name_".$lang;
?>

<!-- Two-Items Testing -->
<div class="container">
<div class="d-flex flex-row justify-content-center flex-wrap my-flex-container">

	@foreach ($products as  $product)

	
     <div class="p-1 my-flex-item" style="width: 165px; ">
     	
     	<div class="card" style="padding: 5px;position: relative; ">
            
            <a href="{{ url("/product/detail/view/{$product->id}") }}" class="cart-text" style="font-size: 60%;text-decoration: none;">

	        <img style="width: 145px; height: 130px;" src="{{ asset("/images/$product->photo1") }}" class="card-img-top" > 

	        <div class="card-block text-center">

	          	<p class="card-title text-danger" >
	          		{{ number_format($product->price) }} MMK
	          	</p>	          	
	      		
	      		<p class="card-text d-inline-block text-truncate" style="font-size: 80%;max-width: 80%;">
	         		{{ $product->$name }}
	      		</p>	       	       
	        </div>

	        </a>
                
        </div>
       

     </div>
 
   	 @endforeach

</div>
</div>
<!-- Two-Items Testing -->	


@endsection