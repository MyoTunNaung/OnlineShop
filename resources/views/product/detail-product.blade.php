@extends('layouts.app')
@section('content')

@include('language_search')

<?php 
		$lang = $_SESSION['lang'];
		$name = "name_".$lang;
?>

<div class="container-xxl">
<div class="row justify-content-center">
		
		<div class="col-md-4">
			<!-- Zoom Image -->
				<div class="container">
				<div class="exzoom hidden" id="exzoom">
				    <div class="exzoom_img_box">
				        <ul class='exzoom_img_ul'>
				            <li><img src="{{ asset("images/$product->photo1") }}"/></li>
				            <li><img src="{{ asset("images/$product->photo2") }}"/></li>
				            <li><img src="{{ asset("images/$product->photo3") }}"/></li>
				            <li><img src="{{ asset("images/$product->photo4") }}"/></li>           
				        </ul>
				    </div>
				    <div class="exzoom_nav"></div>
				    <p class="exzoom_btn">
				        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
				        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
				    </p>
				</div>
				</div>
			<!-- Zoom Image -->
		</div>

		<div class="col-md-8">

			<div class="card text-center">
				<div class="card-header">Details Information</div>
				<div class="card-body">
					<div class="card-text">Name: {{ $product->$name }}</div>
					<div class="card-text">Price: {{ $product->price }}</div>
					<div class="card-text">Qty: {{ $product->qty }}</div>
				</div>
			</div>

		</div>

</div> <!-- Row -->
</div> <!-- Container --> 


<div class="container-xxl">
<div class="row justify-content-center">
	<div class="col-md-12 text-center">
		
		<form method="get" enctype="multipart/form-data" action="{{ url("/product/addToCartQty/{$product->id}") }}" >
			{{ csrf_field() }} <!-- @csrf -->

			<span>
				Quantity : 
				<input style="width: 100px;"  type="number" name="pqty"  min="1" value="0" max="{{ $product->qty }}">
			</span>	  		

    		@if($product->qty > 0)		    		
    			<input  type="submit"  value="Add to Cart" class="btn btn-primary" >
    		@else
    			<input  type="submit" value="Out of Stock" class="btn btn-danger" disabled>	
    		@endif

		</form>

	</div>
</div> <!-- Row -->
</div> <!-- Container --> 


<script type="text/javascript">

    $('.container').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@endsection