@extends('index')
@section('content')

    {{-- //Giới Thiệu --}}
    <div class="description mt-5">
      <div class="container">
        <div>
          <h3>GIỚI THIỆU</h3>
          <button class="scroller mb-3"></button>
          <br>
          <p1>Hợp tác xã Xóm Đồng 2 được thành lập vào năm 2021, hiện có 38 thành viên, với diện tích trồng vú sữa bơ hồng là 30ha và vú sữa tím là 15ha. trái cây hiện đã được xuất khẩu sang thi trường Mỹ với sản lượng đạt 30-40 tấn/1 vụ, cung cấp cho thị trường nội địa 90 tấn. Trái cây sản xuất theo quy trình xuất khẩu. Đảm bảo cung cấp đủ sản lượng theo đơn đặt hàng </p1>
        </div>
        <div class="row mt-5" >
          @foreach($introduction as $introduction)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="image">
                        @if($introduction->image)
                          <img src="{{ asset('storage/' . $introduction->image) }}" alt="{{ $introduction->image }}">
                        @endif
                    </div>
                    <div class="content">
                        <a href="{{ route('IntroduceDetail', ['id' => $introduction->id]) }}">
                            <span class="title">
                                <p>{{ $introduction->title }}</p>
                            </span>
                        </a>
                        <p class="desc">
                          {!! Str::limit(strip_tags($introduction->description), 300, '...') !!}
                      </p>
                      <button style="background-color:red;" class="xemthem">
                        <a href="{{ route('IntroduceDetail', ['id' => $introduction->id]) }}">Xem Thêm</a>
                      </button>
                    </div>
                </div>
            </div>
          @endforeach
        </div>

      </div>

    </div>
    {{-- Sản phẩm của chúng tôi --}}
    <div class="container">
      <div class="description mt-5">
        <h3>SẢN PHẨM CỦA CHÚNG TÔI</h3>
        <button class="scroller mb-3"></button>
        <div class="slider-container">
          <button id="slideLeft3" class="slide-button"><</button>
          <div class="slider" id="productSlider3">
            @foreach($product as $product)
            <div class="slide">
              <div class="card2">
                <div class="image-container">
                  @if($product->image_product)
                    <img src="{{ asset('storage/' . $product->image_product) }}" alt="{{ $product->image_product }}">
                  @endif
                  <button class="more-info xemthem"><a href="{{ route('ProductDetail', ['id' => $product->id]) }}">Xem thêm</a></button>
                </div>
                <div class="card-content mt-3">
                  <h4>{{ $product->title_product }}</h4>
                  {{-- <p>Card description goes here.</p> --}}
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <button id="slideRight3" class="slide-button">></button>
        </div>
      </div>
    </div>
    {{-- Sản phẩm nổi bật --}}
  <div class="product-strong">
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 col-md-12">
          <div class="description mt-3">
            <h4>SẢN PHẨM NỔI BẬT</h4>
          </div>
          <div class="title-name">
            <h4>Vú sữa bơ hồng tại hợp tác xã Xóm Đồng 2</h4>
          </div>
          <div class="define-name">
            <p>Chúng tôi tâm huyết đưa tới sản phẩm vú sữa bơ hồng  chất lượng số một, đã được kiểm định, Năm 2022, vú sữa bơ hồng đã được UBND tỉnh Sóc Trăng công nhận là sản phẩm OCOP 4 sao, đạt tiêu chuẩn chất lượng xuất khẩu.</p>
            <p>HTX đã liên kết với Công ty TNHH Thương mại - Dịch vụ - Xuất nhập khẩu Vina T&T xuất khẩu  vú sữa bơ hồng sang thị trường Mỹ</p>
          </div>
        </div>
        <div class="col-lg-5 col-md-12 d-flex justify-content-center" >
          <img src="{{ ('images/vusuabohong3-removebg-preview.png') }}" alt="" style="width: 300px; height:300px; filter: drop-shadow(1px 10px 10px red);">
        </div>

      </div>
    </div>
        
  </div>

    {{-- Hình ảnh trong trang tin tức mưới nhất --}}
    <div class="container">
        <div class="row ">
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/dientichdatvusua.jpeg') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/thuhoachvusua.webp') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/GT-HTX.jpeg') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center  pe-1">
            <div class="card3">
              <img src="{{ ('images/haivusua.jpeg') }}" alt="" class="image-strong">
            </div>
          </div>
        </div>
        <div class="row pb-20">
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/time.webp') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/tintuc1.jpeg') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/kiemdinhvusua.jpeg') }}" alt="" class="image-strong">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center pe-1">
            <div class="card3">
              <img src="{{ ('images/thuhoach.webp') }}" alt="" class="image-strong">
            </div>
          </div>
        </div>
    </div>
    
    <div class="container mt-5">
      <div class="description mt-5">
          <h3>TIN TỨC - SỰ KIỆN</h3>
          <button class="scroller mb-3"></button>
      </div>
      <div class="row">
          @if($events->count() > 0)
              <!-- Phần tin tức lớn -->
              <div class="col-lg-6 col-md-12 col-xs-12 content-app mt-2">
                  @foreach($events->take(1) as $event)
                      <div class="card4 mt-2">
                          <a href="{{ url('pages/tintuc/chitiettintuc', $event->id) }}">
                           
                            <a href=" {{ route('EventDetail', ['id' => $event->id]) }}">
                              <div class="card-image">
                                  <img src="{{ asset('storage/' . $event->image_event) }}" alt="{{ $event->title_event }}">
                              </div>
                          </a>
                          <div class="card-content">
                              <p>TIN TỨC - SỰ KIỆN</p>
                              <div class="card-title">
                                  <h6>{{ $event->title_event }}</h6>
                              </div>
                              <div class="day">{{ $event->created_at->format('d/m/Y') }}</div>
                          </div>
                      </div>
                  @endforeach
              </div>
              
              <!-- Phần tin tức nhỏ bên phải -->
              <div class="col-lg-3 col-md-6 col-xs-12">
                  @foreach($events->skip(1)->take(2) as $event)
                      <div class="card4 mt-2 content-app">
                          <a href="{{ url('pages/tintuc/chitiettintuc', $event->id) }}">
                              <div class="card-image">
                                  <img src="{{ asset('storage/' . $event->image_event) }}" alt="{{ $event->title_event}}">
                              </div>
                          </a>
                          <div class="card-content">
                              <p>TIN TỨC - SỰ KIỆN</p>
                              <div class="card-title">
                                  <h6>{{ $event->title_event }}</h6>
                              </div>
                              <div class="day">{{ $event->created_at->format('d/m/Y') }}</div>
                          </div>
                      </div>
                  @endforeach
              </div>
  
              <!-- Phần tin tức nhỏ thứ hai bên phải -->
              <div class="col-lg-3 col-md-6 col-xs-12">
                  @foreach($events->skip(3)->take(2) as $event)
                      <div class="card4 mt-2 content-app">
                          <a href="{{ url('pages/tintuc/chitiettintuc', $event->id) }}">
                              <div class="card-image">
                                  <img src="{{ asset('storage/' . $event->image_event) }}" alt="{{ $event->title_event }}">
                              </div>
                          </a>
                          <div class="card-content">
                              <p>TIN TỨC - SỰ KIỆN</p>
                              <div class="card-title">
                                  <h6>{{ $event->title_event }}</h6>
                              </div>
                              <div class="day">{{ $event->created_at->format('d/m/Y') }}</div>
                          </div>
                      </div>
                  @endforeach
              </div>
          @else
              <p>Không có tin tức nào.</p>
          @endif
      </div>
  </div>
  
@endsection