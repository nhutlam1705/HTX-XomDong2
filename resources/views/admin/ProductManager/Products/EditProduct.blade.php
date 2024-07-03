
@extends('admin.index')
@section('content')
    <div class="container p-30">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật Nông Sản</h3>
              </div>
              <div class="row ml-3 mt-2">
                <a href="{{ route('introductions.showall') }}" class="btn btn-success mr-1 w-5">Danh sách</a>
            </div>
              <form action="{{ route('Products.UpdateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title_product">Tên Sản Phẩm:</label>
                    <input type="text" name="title_product" class="form-control col-12" id="title_product" placeholder="Ổi,mít,..." required  value="{{ $product->title_product }}">
                  </div>
                  <div class="form-group mb-3">
                    <select name="category_id" class="form-control" id="category_id">
                        <option value="">none</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->title_category }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                  <div class="form-group mt-2">
                    <div class="row d-flex">
                        <div class="col-3">
                            <label for="image">Hình Ảnh Chính:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image"  name="image_product" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right"></div>
                                @if($product->image_product)
                                    <img src="{{ Storage::url($product->image_product) }}" id="imagePreview" class="image-box-insert mt-2">
                                @else
                                    Không có hình ảnh
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 1:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image2"  name="image_product1" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right"></div>
                                @if($product->image_product1)
                                    <img src="{{ Storage::url($product->image_product1) }}" id="imagePreview2" class="image-box-insert mt-2">
                                @else
                                    Không có hình ảnh
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 2:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image3"  name="image_product2" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right"></div>
                                @if($product->image_product2)
                                    <img src="{{ Storage::url($product->image_product2) }}" id="imagePreview3" class="image-box-insert mt-2">
                                @else
                                    Không có hình ảnh
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="image">Hình Ảnh Phụ 3:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image4"  name="image_product3" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append float-right"></div>
                                @if($product->image_product3)
                                    <img src="{{ Storage::url($product->image_product3) }}" id="imagePreview4" class="image-box-insert mt-2">
                                @else
                                    Không có hình ảnh
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description_product">Mô Tả Sản Phẩm:</label>
                    <br>
                    <textarea name="description_product" id="summernote" cols="60" rows="10">{{ $product->description_product }}</textarea>
                  </div>           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary alight-item-center">Cập Nhật</button>
                </div>
              </form>
            </div>
    </div>
@endsection

