<?php 
use App\Models\Category;
use App\Models\Item;

$categories = Category::all();
$items    = Item::all();

?>

@extends('layouts.app')
@section('content')

@include('language_search')
@include('header')

<?php 
		$lang = $_SESSION['lang'];
		$name = "name_".$lang;
?>


<!-- Main Category  -->
	<div class="container-xxl">
	<div class="row">

	@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif

	        
	@foreach($categories as $category)
	<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 pr-1 pl-1 mt-3">
	<div class="card text-center" >

	    <a class="card-text" href="{{ url("/product/category/view/{$category->id}") }}" >

	        <img width="100" height="150" class="card-img-top" src="images/{{$category->photo}}" alt="No Image" >

	        <div class="card-body">                
	            <p class="card-text d-inline-block text-truncate" style="font-size: 90%;max-width: 95%;">
	            {{ $category->$name }}                   
	            </p>
	        </div>
	            
	    </a>

	</div> <!-- Card -->
	</div> <!-- Col -->
	@endforeach
	 
	</div> <!-- Row -->
	</div> <!-- Container -->
	
<!-- Main Category  -->

@endsection