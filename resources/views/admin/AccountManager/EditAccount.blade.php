@extends('admin.index')

@section('content')
<div class="container">
    <h1>Cập nhật tài khoản</h1>

    <form action="{{ route('AccountManager.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
            @if ($user->image)
              <img src="{{ asset('storage/' . $user->image) }}" class="image-box-insert mt-2" style="max-width: 200px;">
            @endif
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
        </div>

        {{-- <div class="form-group">
            <label for="active_region_id">Active Region:</label>
            <select name="active_region_id" id="active_region_id" class="form-control">
                <option value="">None</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ $user->active_region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
