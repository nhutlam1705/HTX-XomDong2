<!-- resources/views/users/showprofile.blade.php -->

@extends('admin.index')

@section('content')
<div class="container">
    <h1>Thông Tin Người Dùng</h1>

    <div class="card">
        {{-- <div class="card-header">
            {{ $user->name }}
        </div> --}}
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên:</label>
                <p>{{ $user->name }}</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <p>{{ $user->email }}</p>
            </div>
            
            <div class="form-group">
                <label for="role">Vai Trò:</label>
                <p>{{ $user->role ? 'Admin' : 'User' }}</p>
            </div>

            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <p>{{ $user->phone }}</p>
            </div>

            <div class="form-group">
                <label for="active_region">Trạng thái:</label>
                <p>{{ $user->activeRegion ? ($user->activeRegion->name ? 'Active' : 'Inactive') : 'Không có' }}</p>
            </div>

            <div class="form-group">
                <label for="created_at">Ngày Tạo:</label>
                <p>{{ $user->created_at }}</p>
            </div>

            <div class="form-group">
                <label for="updated_at">Ngày Cập Nhật:</label>
                <p>{{ $user->updated_at }}</p>
            </div>
        </div>
    </div>

    <a href="{{ ('../../../admin/index') }}" class="btn btn-secondary mt-3">Về trang chủ</a>
</div>
@endsection
