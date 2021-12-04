@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Events</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section events-list">
        <div class="container">
            <p class="text-center">Browse through the events we have scheduled as a society.</p>

            <div class="row">

                @foreach ($events as $event)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <a href="{{ route('single-event', $event->id) }}">
                            <div class="item">
                                <img src="{{ asset('uploads/events/' . $event->image) }}" class="img-responsive"
                                    alt="event">
                                <p><i class="fa fa-calendar"></i> {{ $event->schedule_date->format('d-m-Y') }}</p>
                                <h3>{{ $event->title }}</h3>
                                <button type="button" class="btn btn-more">read more</button>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section pagination">
        <div class="container">
            {{ $events->links() }}
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
