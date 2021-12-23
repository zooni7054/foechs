@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Contact Information</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section contact-intro">
        <div class="container">
            <div class="content">
                <h2>We’re here to help!</h2>
                <p>If you have any questions or concerns about anything, please don’t hesitate to give us a call or fill out
                    our contact form!</p>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section contact-form">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="contact-info">
                        <h3>Contact information</h3>
                        <p><strong>Phone: </strong><br><a href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a></p>
                        <p><strong>Email: </strong><br><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></p>
                        <p><strong>Address: </strong><br>{{ $settings['address'] }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="{{ route('contact-us.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message"></textarea>
                        </div>
                        <button class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="clearfix"></div>

    <div class="section map">
        <div class="map-area">
            <iframe
                src="{{ $settings['map_iframe'] }}"
                frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
