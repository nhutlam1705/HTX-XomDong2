@extends('admin.index')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh Sách tài khoản</h3>
                        </div>
                        <a href="{{ route('AccountManager.CreateAccount') }}" class="btn btn-primary mb-3">Thêm người dùng mới</a>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Ảnh Đại Diện</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày Đăng ký</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if($user->image)
                                                <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" width="50">
                                            @else
                                                Không có ảnh
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->activeRegion ? $user->activeRegion->name : 'Không có' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <form action="{{ route('AccountManager.ApproveAccount', $user->id) }}" method="POST" style="width: 100%;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                            </form>
                                            <a href="{{ route('AccountManager.EditAccount', $user->id) }}" class="btn btn-warning btn-sm">Cập nhật</a>
                                            <form action="{{ route('AccountManager.Destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
