@extends('admin.index')
@section('content')
    <div class="container p-30">
          <!-- left column -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Loại Nông Sản</h3>
              </div>
              <!-- /.card-header -->
              <div class="row ml-3 mt-2">
                <a href="{{ route('CategoryProduct.ShowCategory') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <!-- form start -->
              <form action="{{ route('CategoryProduct.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Tên Danh Mục</label>
                    <input type="text" name="title_category" class="form-control col-12" id="title" placeholder="Tên danh mục" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image_category" accept="image/*" required >
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                      </div>
                      <div class="input-group-append float-right">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                      <img id="imagePreview" src="" alt="Hình ảnh sẽ hiển thị ở đây"class="image-box-insert">
                  </div>
                  <div class="form-group">
                    <label for="description">Mô Tả:</label>
                    <br>
                    <textarea name="description_category" id="summernote" cols="60" rows="10" required></textarea>
                  </div>           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary alight-item-center">Thêm mới</button>
                </div>
              </form>
            </div>
    </div>
@endsection
