@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Recent Updates</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section updates-list">
        <div class="container">

            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="row item @if ($loop->last) no-border @endif">
                        <div class="col-md-2">
                            <div class="calendar-area">
                                <i class="fa fa-calendar"></i>
                                <p>{{ $post->created_at->format('d-m-Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="content-area">
                                <a href="{{ route('single-update', $post->id) }}">
                                    <h3>{{ $post->title }}</h3>
                                </a>
                                <p>{{ $post->short_description }}</p>
                                <a href="{{ route('single-update', $post->id) }}" class="btn btn-primary btn-more">read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <h3 class="text-center">No Albums Found</h3>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section pagination">
        <div class="container">
            {{ $posts->links() }}
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
