@extends('admin.index')
@section('content')
<div class="container bg-light">
    <div class="container-fluid justify-content-center">
        <h1 style="text-align:center">{{ $introduction->title }}</h1>
        <p class="m-3">{!! $introduction->description !!}</p>
    </div>
    
    
    {{-- @if($introduction->image)
        <div>
            <img src="{{ asset('storage/' . $introduction->image) }}" alt="Image 1" width="200">
        </div>
    @endif

    @for ($i = 2; $i <= 5; $i++)
        @php
            $descField = 'description' . $i;
            $imageField = 'image' . $i;
        @endphp
        @if($introduction->$imageField)
            <div>
                <p>{{ $introduction->$descField }}</p>
                <img src="{{ asset('storage/' . $introduction->$imageField) }}" alt="Image {{ $i }}" width="200">
            </div>
        @endif
    @endfor --}}
</div>
@endsection