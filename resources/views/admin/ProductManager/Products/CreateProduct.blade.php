@extends('admin.index')
@section('content')
    <div class="container p-30">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Nông Sản</h3>
              </div>
              <div class="row ml-3 mt-2">
                <a href="{{ route('introductions.showall') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <form action="{{ route('Products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title_product">Tên Sản Phẩm:</label>
                    <input type="text" name="title_product" class="form-control col-12" id="title_product" placeholder="Ổi,mít,..." required>
                  </div>
                  <div class="form-group">
                        <label for="category_id">Loại Sản Phẩm</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title_category }}</option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group">
                    <div class="row d-flex">
                        <div class="col-3">
                            <label for="image">Hình Ảnh Chính:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image"  name="image_product" accept="image/*" required >
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right">
                                   
                                </div>
                            </div>
                            <img id="imagePreview" src="" class="image-box-insert">
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 1:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image2"  name="image_product1" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right">
                                   
                                </div>
                            </div>
                            <img id="imagePreview2" src="" class="image-box-insert">
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 2:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image3"  name="image_product2" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right">
                                   
                                </div>
                            </div>
                            <img id="imagePreview3" src="" class="image-box-insert">
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 3:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image4"  name="image_product3" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right">
                                   
                                </div>
                            </div>
                            <img id="imagePreview4" src="" class="image-box-insert">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description_product">Mô Tả Sản Phẩm:</label>
                    <br>
                    <textarea name="description_product" id="summernote" cols="60" rows="10" required></textarea>
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
