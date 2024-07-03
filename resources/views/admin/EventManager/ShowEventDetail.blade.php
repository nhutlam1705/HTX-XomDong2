@extends('admin.index')
@section('content')
<div class="container bg-light">
    <div class="container-fluid justify-content-center">
        <h1 style="text-align:center">{{ $event->title_event }}</h1>
        <p class="m-3">{!! $event->description_event !!}</p>
    </div>
    
</div>
@endsection