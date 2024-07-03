@extends('index')


@section('content')
    <main>
        <section class="section1">
            <h2> {{ $introduction->title }}</h2>
            {!! $introduction->description !!}
        </section>
    </main>
    
@endsection
