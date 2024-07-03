@extends('admin.index')
@section('content')
    <div class="container p-30">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật giới thiệu</h3>
              </div>
              <div class="row ml-3 mt-2">
                <a href="{{ route('introductions.showall') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <form action="{{ route('introductions.update', $introduction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Tiêu Đề:</label>
                    <input type="text" name="title" class="form-control col-12" id="title" value="{{ $introduction->title }}" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                      </div>
                      <div class="input-group-append float-right">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @if ($introduction->image)
                      <img src="{{ asset('storage/' . $introduction->image) }}" alt="Hình ảnh hiện tại" class="image-box-insert mt-2" style="max-width: 200px;">
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="description">Giới Thiệu:</label>
                    <br>
                    <textarea name="description" id="summernote" cols="60" rows="10" required>{{ $introduction->description }}</textarea>
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
