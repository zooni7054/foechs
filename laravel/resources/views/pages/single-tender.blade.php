@extends('layouts.default')

@section('meta-title', $tender->meta_title)

@section('meta-description', $tender->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>{{ $tender->title }}</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section single-event">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="image-area">
                        <a href="{{ asset('uploads/tenders/'.$tender->path) }}" class="with-caption image-link">
                            <img src="{{ asset('uploads/tenders/' . $tender->path) }}" class="img-responsive" alt="{{ $tender->title }}">
                        </a>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="content-area">
                        <p class="data"><strong>Posted Date: </strong> {{ $tender->created_at->format('d-m-Y') }}</p>
                        <p>{{ $tender->description }}</p>
                        <a href="{{ $tender->download_link }}" class="btn btn-primary" target="_blank">Download Document</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>


@endsection
