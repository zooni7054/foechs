@extends('layouts.default')

@section('meta-title', $album->meta_title)

@section('meta-description', $album->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>{{ $album->title }} - Gallery</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section single-gallery">
        <div class="container">
            @if(count($images) > 0)
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-sm-6 col-md-4">
                            <div class="item">
                                <a href="{{ asset('uploads/albums/'.$album->id.'/'.$image->path) }}" class="with-caption image-link">
                                    <img src="{{ asset('uploads/albums/'.$album->id.'/'.$image->path) }}" class="img-thumbnail" alt="image {{ $image->id }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else 
                <h3 class="text-center">No Images Found</h3>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="pagination">
        <div class="container">
            {{ $images->links() }}
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
