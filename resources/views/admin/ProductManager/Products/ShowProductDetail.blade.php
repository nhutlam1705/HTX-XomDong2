@extends('admin.index')
@section('content')
<div class="container mt-5 mb-10">
    <div class="row">
        <div class="col-lg-6">
          <div class="product-detail">
            <div class="large-image-container">
              @if($product->image_product)
                <img id="largeImage" src="{{ asset('storage/' . $product->image_product) }}" alt="{{ $product->image_product }}" style="height: 400px; width:400px">
              @endif
            </div>
            <div class="thumbnail-container">
              @if($product->image_product1)
                <img class="thumbnail" src="{{ asset('storage/' . $product->image_product1) }}" alt="{{ $product->image_product1 }}" onclick="changeImage('{{ asset('storage/' . $product->image_product1) }}')" style="height: 150px; width:150px">
              @endif
              @if($product->image_product2)
              <img class="thumbnail" src="{{ asset('storage/' . $product->image_product2) }}" alt="{{ $product->image_product2 }}"  onclick="changeImage('{{ asset('storage/' . $product->image_product2) }}')" style="height: 150px; width:150px">
            @endif
            @if($product->image_product3)
              <img class="thumbnail" src="{{ asset('storage/' . $product->image_product3) }}" alt="{{ $product->image_product3 }}"  onclick="changeImage('{{ asset('storage/' . $product->image_product3) }}')" style="height: 150px; width:150px">
            @endif
            </div>
          </div>
          
        </div>
        <div class="col-lg-6">
            <h3> {{ $product->title_product }}</h3>
            <p>{!! $product->description_product !!}</p>
            <p><b>Giá Bán: Liên hệ SĐT: <strong style="color: red">0945797366 - 0915 620 300 (Mr.Minh)</strong> </b></p>

        </div>
    </div>

</div>
@endsection