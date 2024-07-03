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
                <a href="{{ route('EventManager.ShowallEvent') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <!-- form start -->
              <form action="{{ route('EventManager.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title_event">Tiêu Đề Tin Tức:</label>
                    <input type="text" name="title_event" class="form-control col-12" id="title" placeholder="Tên tiêu đề" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Hình Ảnh Đại Diện Ở Trang Chủ:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image_event" accept="image/*" required >
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                      </div>
                      <div class="input-group-append float-right">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                      <img id="imagePreview" src="" alt="Image"class="image-box-insert">
                  </div>
                  <div class="form-group">
                    <label for="description">Mô Tả Chi Tiết Cho Trang Tin Tức:</label>
                    <br>
                    <textarea name="description_event" id="summernote" cols="60" rows="10" required></textarea>
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
