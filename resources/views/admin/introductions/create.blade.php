@extends('admin.index')
@section('content')
    <div class="container p-30">
          <!-- left column -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm trang giới thiệu</h3>
              </div>
              <!-- /.card-header -->
              <div class="row ml-3 mt-2">
                <a href="{{ route('introductions.showall') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
                <a href="{{ route('introductions.create') }}" class="btn btn-success ml-1 w-5">Import file</a>
            </div>
              <!-- form start -->
              <form action="{{ route('introductions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Tiêu Đề:</label>
                    <input type="text" name="title" class="form-control col-12" id="title" placeholder="Tên tiêu đề" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image" accept="image/*" required >
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                      </div>
                      <div class="input-group-append float-right">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                      <img id="imagePreview" src="" alt="Hình ảnh sẽ hiển thị ở đây"class="image-box-insert">
                  </div>
                  <div class="form-group">
                    <label for="description">Giới Thiệu:</label>
                    <br>
                    <textarea name="description" id="summernote" cols="60" rows="10" required></textarea>
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
