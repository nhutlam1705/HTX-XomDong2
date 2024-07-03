@extends('admin.index')
@section('content')
<style>
    .show-content{
        word-wrap: break-word;
        word-break: break-all;
        overflow-wrap: break-word;
        white-space: normal;
        max-width: 214px; 
        height: 200px;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        flex-grow: 1;
    }
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh Sách Trang Giới Thiệu</h3>
                        </div>
                        <div class="row ml-3 mt-2">
                            <a href="{{ route('EventManager.CreateEvent') }}" class="btn btn-success mr-1 w-5">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($events->isEmpty())
                                <p>Không có giới thiệu nào được tìm thấy.</p>
                            @else
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            {{-- <th>Đăng bởi</th> --}}
                                            <th>Tiêu Đề</th>
                                            <th>Lời Giới Thiệu</th>
                                            <th>Hình Ảnh</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Đăng</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $event)
                                            <tr>
                                                <td>{{ $event->id }}</td>
                                                {{-- <td>{{ $introduction->user->name }}</td> --}}
                                                <td>{{ $event->title_event }}</td>
                                                <td> {!! Str::limit(strip_tags($event->description_event), 200, '...') !!}</td>
                                                <td>
                                                    @if($event->image_event)
                                                        <img src="{{ Storage::url($event->image_event) }}" alt="Event Image" style="width: 100px; height: auto;">
                                                    @else
                                                        Không có hình ảnh
                                                    @endif
                                                </td>
                                                <td>{{ $event->activeRegion ? $event->activeRegion->name : 'Không có' }}</td>
                                                <td>{{ $event->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                                        <a href="{{ route('EventManager.ShowDetailEvent', $event->id) }}" class="btn btn-info mb-2 w-100">Xem</a>
                                                        <a href="{{ route('EventManager.EditEvent', $event->id) }}" class="btn btn-warning mb-2 w-100">Sửa</a>
                                                        @if (auth()->user() && auth()->user()->role)
                                                            <form action="{{ route('EventManager.DestroyEvent', $event->id) }}" method="POST" style="width: 100%;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger w-100">Xóa</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
