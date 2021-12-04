@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Gallery</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section gallery">
        <div class="container">
            <p class="text-center">Browse through the pictures captured on different events.</p>
            @if(count($albums) > 0)
                <div class="row">
                    @foreach ($albums as $album)
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ route('single-album', $album->id) }}">
                                <div class="item">
                                    <div class="image-area">
                                        @if(count($album->images) > 0)
                                            @php
                                                $albumImage = $album->images[0]->path;
                                            @endphp
                                            <img src="{{ asset('uploads/albums/'.$album->id.'/'.$albumImage) }}" class="img-responsive" alt="">
                                        @else
                                            <img src="{{ asset('uploads/albums/default.png') }}" class="img-responsive" alt="">
                                        @endif

                                        <div class="counts">
                                            <i class="fa fa-picture-o"></i><br>
                                            {{ count($album->images) }}
                                        </div>

                                    </div>
                                    <h3>{{ $album->title }}</h3>
                                    <button class="btn btn-more">view all images</button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else 
                <h3 class="text-center">No Albums Found</h3>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
