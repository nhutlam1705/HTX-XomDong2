    
    {{-- <a href="{{ ('/') }}" >
        
    </a> --}}
    <img src="{{ asset('images/logo.png') }}" alt="" class="navbar-brand">
    <div class="navbar-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <div class="navbar-container">
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="{{ ('/') }}" class="navbar-link">Trang Chủ</a></li>
            <li class="navbar-item"><a href="{{  route('Introduce') }}" class="navbar-link">Giới Thiệu</a></li>
            <li class="navbar-item"><a href="{{ route('Product') }}" class="navbar-link">Sản Phẩm</a></li>
            <li class="navbar-item"><a href="{{ route('Event')}}" class="navbar-link">Tin Tức</a></li>
            <li class="navbar-item"><a href="{{  route('Contact') }}" class="navbar-link">Liên Hệ</a></li>
            <li class="navbar-item">
                <input type="text" class="navbar-search" placeholder="Tìm kiếm...">
            </li>
        </ul>
    </div>