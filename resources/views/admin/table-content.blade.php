{{-- <section class="content">
  @php
  // Đếm số lượng introductions
    $introductionCount = \App\Models\Introduction::count();
    // $adminCount = \App\Models\Introduction::count();
  @endphp
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Giới Thiệu</span>
              <span class="info-box-number">{{ $introductionCount }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sản phẩm</span>
              <span class="info-box-number">38</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tin tức</span>
              <span class="info-box-number">19</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tài khoản</span>
              <span class="info-box-number">12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </div><!--/. container-fluid -->
  </section>
   --}}

<section class="content mb-3">
    @php
    // Đếm số lượng introductions
      $introductionCount = \App\Models\Introduction::count();
      $userCount = \App\Models\User::count();
      $eventCount = \App\Models\Event::count();
      $productCount = \App\Models\Product::count();
    @endphp

    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $productCount }}</h3>
            <p>SẢN PHẨM</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
        <div class="small-box bg-success">
          <div class="inner"><h3>{{ $introductionCount }}</h3><p>GIỚI THIỆU</p></div>
          <div class="icon"><i class="ion ion-stats-bars"></i></div>
          <a href="{{ Route('introductions.showall') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
        <div class="small-box bg-warning">
          <div class="inner"><h3>{{ $userCount }}</h3><p>TÀI KHOẢN</p></div>
          <div class="icon"><i class="ion ion-person-add"></i></div>
          <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
        <div class="small-box bg-danger">
          <div class="inner">
          <h3>{{ $eventCount }}</h3><p>TIN TỨC</p></div>
          <div class="icon"><i class="ion ion-pie-graph"></i></div>
          <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
</section>
  
  
  
    