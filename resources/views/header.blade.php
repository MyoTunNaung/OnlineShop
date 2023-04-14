<?php 
use App\Models\Category;
use App\Models\Item;

$categories = Category::all();
$items    = Item::all();

?>

<?php 
    $lang = $_SESSION['lang'];
    $name = "name_".$lang;
?>

<!-- Header -->
<div class="container-xxl">
<div class="row">

<!-- Menu -->    
<div class="col-4">
<!-- <h5 class="categoryname"> Category </h5> -->
<div class="alllink">
  <ul>
    @foreach($categories as $category)
      <li>
        <a href="{{ url("/product/category/view/{$category->id}") }}" class="categorylink">
          {{ $category->$name }} 
          <i class="fa fa-angle-right"></i> 
        </a>
          <div class="submenu1">
            <ul>
              @foreach($items as $item)
                  @if($category->id == $item->category_id)
                  <li> 
                    <a href="{{ url("/product/item/view/{$item->id}") }}">
                      {{ $item->$name }}
                    </a>
                  </li>
                  @endif
              @endforeach                   
            </ul>
          </div>
      </li>
      @endforeach
  </ul>
</div> <!-- alllink --> 
</div> <!-- Col-3 -->
<!-- Menu -->

   <!-- Carousel -->
  <div class="col-md-8">

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset("caro_images/1.jpg") }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset("caro_images/2.jpg") }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset("caro_images/3.jpg") }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

  </div>
  <!-- Carousel -->

</div> <!-- Row -->
</div> <!-- Container -->

<!-- Header -->