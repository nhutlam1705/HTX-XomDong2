@extends('admin.index')
@section('content')
    <div class="container p-30">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật Danh Mục Sản Phẩm</h3>
              </div>
              <div class="row ml-3 mt-2">
                <a href="{{ route('CategoryProduct.ShowCategory') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <form action="{{ route('CategoryProduct.UpdateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Danh Mục:</label>
                    <input type="text" name="title_category" class="form-control col-12" id="title" value="{{ $category->title_category }}" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image_category">
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                      </div>
                      <div class="input-group-append float-right">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @if($category->image_category)
                        <img src="{{ Storage::url($category->image_category) }}" id="imagePreview" class="image-box-insert">
                    @else
                        Không có hình ảnh
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="description">Mô Tả:</label>
                    <br>
                    <textarea name="description_category" id="summernote" cols="60" rows="10" required>{{ $category->description_category }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary alight-item-center">Cập nhật</button>
                </div>
              </form>
            </div>
    </div>
@endsection