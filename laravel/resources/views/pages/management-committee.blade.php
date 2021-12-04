@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Management Committee</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section home-committee">
        <div class="container">
            <p class="text-center">Here are the elected members who are taking care of the society matters.</p>

            <div class="row">

                @foreach ($members as $member)
                    <div class="col-xs-6 col-sm-6 col-md-3">
                        <div class="item">
                            <img src="{{ asset('uploads/members/' . $member->image) }}" class="img-responsive"
                                alt="{{ $member->name }}">
                            <h3>{{ $member->name }}</h3>
                            <p>{{ $member->designation }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
