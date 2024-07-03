<!-- Brand Logo -->
<a href="../../../../../../admin/index" class="brand-link">
    <img src="../../../../../../images/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HTX Xóm Đồng 2</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../../../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline mb-2" id="filterFunction">
      <div class="input-group" data-widget="sidebar-search" >
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <div>
      <h5> Quản lí nguồn dữ liệu</h5>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Giới Thiệu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (auth()->user() && auth()->user()->role)
              <li class="nav-item">
                <a href="{{ route('introductions.BrowserIntroduction') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Duyệt bài viết</p>
                </a>
              </li>
            @endif
            <li class="nav-item">
              <a href="{{ route('introductions.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('introductions.showall') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh Sách</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Sản Phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh mục Nông sản</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('CategoryProduct.CreateCategory') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('CategoryProduct.ShowCategory') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Danh Sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('CategoryProduct.BrowserCategory') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Duyệt</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nông sản</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('Products.CreateProduct') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('Products.ShowProduct') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Danh Sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('Products.BrowserProduct') }}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon ml-4"></i>
                    <p>Duyệt</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Tin tức
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('EventManager.CreateEvent') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Tin Tức</p>
              </a>
            </li>
            <li class="nav-item">
              <a href={{ route('EventManager.ShowallEvent') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh Sách Tin Tức</p>
              </a>
            </li>
            @if (auth()->user() && auth()->user()->role)
            <li class="nav-item">
              <a href={{ route('EventManager.BrowserEvent') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Duyệt Tin Tức</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @if (auth()->user() && auth()->user()->role)
          <li class="nav-item">
            <a href="{{ route('AccountManager.ShowAccount') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tài khoản người dùng 
              </p>
            </a>
          </li> 
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->