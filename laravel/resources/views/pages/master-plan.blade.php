@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Master Plan</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section under-construction">
        <div class="container">
            <img src="{{ asset('site/img/master-plan.jpg') }}" class="img-responsive" alt="Master Plan">
            <a href="{{ asset('site/img/master-plan.jpg') }}" target="_blank" class="btn btn-download" style="margin-top: 30px;" download="">Download Master Plan</a>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
