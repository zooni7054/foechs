@extends('layouts.default')

@section('meta-title', $post->meta_title)

@section('meta-description', $post->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Update: {{ $post->title }}</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section single-event">
        <div class="container">
            <div class="content-area">
                <p class="data"><strong>Update Date: </strong> {{ $post->created_at->format('d-m-Y') }}</p>
                {{ $post->description }}
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
                                <a href="{{ asset('uploads/posts/' . $post->id . '/' . $image->path) }}"
                                    class="with-caption image-link">
                                    <img src="{{ asset('uploads/posts/' . $post->id . '/' . $image->path) }}"
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
