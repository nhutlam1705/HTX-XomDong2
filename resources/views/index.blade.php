<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>  
  {{-- header --}}
  <div class="header" >
    <div class="container">
      <div class="row">
        <div class="col-2">
          <div><img src="{{ asset('images/logo.png') }}" alt="" class="logo"></div>
        </div>
        <div class="col-10">
          <div class="row">
            <div class="col-12"><p class="address-header" >0945 797 366 | htxxomdong2@gmail.com</p></div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="titler">
                  <h3> HỢP TÁC XÃ NÔNG NGHIỆP XÓM ĐỒNG 2</h3>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
  <nav class="navbar" id="navbar">
    @include('menu')
  </nav>
  {{-- slide banner --}}
  <div id="carouselExampleAutoplaying" class="carousel slide-banner" data-bs-ride="carousel">
    @include('banner')
  </div>
  @yield('content')
    {{-- footer --}}
  <footer class="footer text-center">
      @include('footer')
  </footer> 
</body>
<script src="../../../../js/app.js"></script>
  
</html>



