@extends('index')
@section('content')
<div class="container mt-2 mb-10">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-5">
          <div class="product-detail">
            <div class="large-image-container">
              @if($productfindone->image_product)
                <img id="largeImage" src="{{ asset('storage/' . $productfindone->image_product) }}" alt="{{ $productfindone->image_product }}">
              @endif
            </div>
            <div class="thumbnail-container">
              @if($productfindone->image_product1)
                <img class="thumbnail" src="{{ asset('storage/' . $productfindone->image_product1) }}" alt="{{ $productfindone->image_product1 }}" onclick="changeImage('{{ asset('storage/' . $productfindone->image_product1) }}')">
              @endif
              @if($productfindone->image_product2)
              <img class="thumbnail" src="{{ asset('storage/' . $productfindone->image_product2) }}" alt="{{ $productfindone->image_product2 }}"  onclick="changeImage('{{ asset('storage/' . $productfindone->image_product2) }}')">
            @endif
            @if($productfindone->image_product3)
              <img class="thumbnail" src="{{ asset('storage/' . $productfindone->image_product3) }}" alt="{{ $productfindone->image_product3 }}"  onclick="changeImage('{{ asset('storage/' . $productfindone->image_product3) }}')">
            @endif
            </div>
          </div>
          
        </div>
        <div class="col-lg-6 col-md-12">
            <h4 class="description"> {{ $productfindone->title_product }}</h4>
            <p>{!! $productfindone->description_product !!}</p>
            <p><b>Giá Bán: Liên hệ SĐT: <strong style="color: red">0945797366 - 0915 620 300 (Mr.Minh)</strong> </b></p>

        </div>
    </div>

</div>

<div class="container mt-2">
  <h3>CÁC SẢN PHẨM TƯƠNG TỰ</h3>
  <div class="slider-container">
      <button id="slideLeft3" class="slide-button"><</button>
      <div class="slider" id="productSlider3">
        @foreach($productcategory as $productcategory)
        <div class="slide">
          <div class="card2">
            <div class="image-container">
              @if($productcategory->image_product)
                <img src="{{ asset('storage/' . $productcategory->image_product) }}" alt="{{ $productcategory->image_product }}">
              @endif
              <button class="more-info xemthem"><a href="{{ route('ProductDetail', ['id' => $productcategory->id, 'category_id' => $productcategory->category_id]) }}">Xem thêm</a></button>
            </div>
            <div class="card2-content">
              <h4>{{ $productcategory->title_product }}</h4>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <button id="slideRight3" class="slide-button">></button>
    </div>
</div>
  

<div class="container mt-10">
    <h3>CÁC SẢN PHẨM KHÁC</h3>
    <div class="slider-container">
        <button id="slideLeft4" class="slide-button"><</button>
        <div class="slider" id="productSlider4">
          @foreach($product as $product)
          <div class="slide">
            <div class="card2">
              <div class="image-container">
                @if($product->image_product)
                    <img src="{{ asset('storage/' . $product->image_product) }}" alt="{{ $product->image_product }}">
                  @endif
                <button class="more-info xemthem"><a href="{{ route('ProductDetail', ['id' => $product->id]) }}">Xem thêm</a></button>
              </div>
              <div class="card2-content">
                <h4>{{ $product->title_product }}</h4>
                {{-- <p>Card description goes here.</p> --}}
              </div>
            </div>
          </div>
          @endforeach
      </div>
      <button id="slideRight4" class="slide-button">></button>
    </div>
</div>

@endsection


