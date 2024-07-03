@extends('index')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="news-event">Tin Tức & Sự Kiện</div>
                <div class="title-tintuc">{{ $event->title_event }}</div>
                <i class="fa-solid fa-calendar-days card-time-top-right">
                  {{ $event->created_at->format('d/m/Y') }}
                </i>
                <div class="card-title-line"></div>
            </div>
            <div class="row">
              <div class="description-event">
                {!! $event->description_event !!}
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 mt-5 mx-auto">
          <div class="row">
            <div class="row ">
              <div class="news-event">Tin tức nổi bật</div>
            </div>
            <div class="row">
              <div class="col-12 card-tintuc-noibat">
                <a href="{{ url('pages/tintuc/chitiettintuc', 6) }}">
                  @if($eventHot->image_event)
                  <img  class="card-img-top-right" src="{{ asset('storage/' . $eventHot->image_event) }}" alt="{{ $event->image_event}}">
                @endif
                </a>
                  <div class="card-content-top-right">
                    <p class="card-title-top-right">{{ $eventHot->title_event }} </p>
                    <i class="fa-solid fa-calendar-days card-time-top-right">
                      {{ $eventHot->created_at->format('d/m/Y') }}
                    </i>
                  </div>
                </div>
            </div>
          </div>
        <div class="row mt-3">
          <div class="row">
              <div class="news-event">Tin tức mới nhất</div>
          </div>
          @foreach($eventNews as $event)
          <div class="row">
            <div class="col-12 card-tintuc-noibat">
              <a href="{{ url('pages/tintuc/chitiettintuc', $event->id) }}">
                @if($event->image_event)
                  <img  class="card-img-top-right" src="{{ asset('storage/' . $event->image_event) }}" alt="{{ $event->image_event}}">
                @endif
              </a>
                <div class="card-content-top-right">
                  <p class="card-title-top-right">{{ $event->title_event }}</p>
                  <i class="fa-solid fa-calendar-days card-time-top-right">
                    {{ $event->created_at->format('d/m/Y') }}
                  </i>
                </div>
              </div>
          </div>
          @endforeach
        </div>
        <div class="row mt-3">
          <div class="news-event">Các Video Liên Quan</div>
        </div>
          <iframe width="320" height="230" src="https://www.youtube.com/embed/VhBrc_1kFEA?si=F6tHTByHqOMkBvSB" 
          title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <br>
          <iframe width="320" height="230" src="https://www.youtube.com/embed/RloEPotfAMg?si=7V8zETm7dOV-qsIF" 
          title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
</div>
@endsection


