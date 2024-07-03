@extends('index')
@section('content')
   
<div class="container">
  @foreach($categories as $category)
    <div class="box-type">
        <div id="leftBox{{ $category->id }}" class="box left">
         
            <div class="content-box">
                <h4 style="text-align: center">{{ $category->title_category }}</h4>
            </div>
            <div class="row">
                <div class="col-2 ps-4">
                    <button style="background-color:brown; width:3px; height:90px;"></button>
                </div>
                <div  class="col-10" style=" text-align: left; height:-80px;">
                    <p><b>{!! Str::limit(strip_tags($category->description_category), 300, '...') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <img src="{{ ('../images/hangviet.png') }}" alt="" class="icon-chatluong">
                </div>
            </div>
        </div>
        <div id="rightBox{{ $category->id }}" class="box right">
            @if($category->image_category)
            <img src="{{ asset('storage/' . $category->image_category) }}" alt="{{ $category->_category }}">
          @endif
        </div>
    </div>

    <div class="slider-container">
      <button id="slideLeft{{ $category->id }}" class="slide-button"><</button>
      <div class="slider" id="productSlider{{ $category->id }}">
        @foreach($category->products as $product)
        <div class="slide">
          <div class="card2">
            <div class="image-container">
                @if($product->image_product)
                  <img src="{{ asset('storage/' . $product->image_product) }}" alt="{{ $product->image_product }}">
                @endif
              <button class="more-info xemthem"><a href="{{ route('ProductDetail', ['id' => $product->id]) }}">Xem thêm</a</button>
            </div>
            <div class="card2-content">
              <h3 style="color: red;">{{ $product->title_product }}</h3>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <button id="slideRight{{ $category->id }}" class="slide-button">></button>
    </div>
    @endforeach
</div>

<script>
  function initializeSection(leftBoxId, rightBoxId, slideLeftId, slideRightId, productSliderId, scrollThreshold) {
      const leftBox = document.getElementById(leftBoxId);
      const rightBox = document.getElementById(rightBoxId);
      const slideLeft = document.getElementById(slideLeftId);
      const slideRight = document.getElementById(slideRightId);
      const productSlider = document.getElementById(productSliderId);
      let hasScrolled = false;
      // Set z-index initially
      leftBox.style.zIndex = 2;
      rightBox.style.zIndex = 2;
  
      // Function to move boxes to the center
      function moveToCenter() {
          leftBox.classList.add('center-left');
          rightBox.classList.add('center-right');
      }
      window.addEventListener('scroll', () => {
          // Check if the scroll position is greater than the threshold
          if (!hasScrolled && window.scrollY > scrollThreshold) {
              moveToCenter();
              hasScrolled = true;
  
              // Scroll horizontally to the productSlider
              productSlider.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
          }
      });
  
      slideLeft.addEventListener('click', function() {
          productSlider.scrollLeft -= 300; // Adjust scroll value as needed
      });
  
      slideRight.addEventListener('click', function() {
          productSlider.scrollLeft += 300; // Adjust scroll value as needed
      });
    }
    const scrollThresholds = [200, 700, 1200, 1700, 2200];
      @foreach($categories as $index => $category)
        initializeSection('leftBox{{ $category->id }}', 'rightBox{{ $category->id }}', 'slideLeft{{ $category->id }}', 'slideRight{{ $category->id }}', 'productSlider{{ $category->id }}',scrollThresholds[{{ $index }}]); // Adjust scroll threshold as needed
      @endforeach
</script>
@endsection