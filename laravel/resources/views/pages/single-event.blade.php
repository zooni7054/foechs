@extends('layouts.default')

@section('meta-title', $event->meta_title)

@section('meta-description', $event->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Event: {{ $event->title }}</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section single-event">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="image-area">
                        <img src="{{ asset('uploads/events/' . $event->image) }}" class="img-responsive" alt="{{ $event->title }}">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="content-area">
                        <p class="data"><strong>Event Date: </strong> {{ $event->schedule_date->format('d-m-Y') }}</p>
                        {{ $event->description }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    @if (count($images) > 0)

        <div class="section single-gallery">
            <div class="container">
                <h2 class="text-center" style="margin-bottom: 30px;">Event Pictures</h2>
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-sm-6 col-md-4">
                            <div class="item">
                                <a href="{{ asset('uploads/albums/' . $event->album_id . '/' . $image->path) }}"
                                    class="with-caption image-link">
                                    <img src="{{ asset('uploads/albums/' . $event->album_id . '/' . $image->path) }}"
                                        class="img-thumbnail" alt="image {{ $image->id }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="pagination">
            <div class="container">
                {{ $images->links() }}
            </div>
        </div>

    @else
        <div class="section"></div>
    @endif



    <div class="clearfix"></div>

@endsection
