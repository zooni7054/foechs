@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

<div class="slider-area">
    <div class="container-full">
        <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                <li data-target="#carousel-id" data-slide-to="3" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('site/img/slider/slide-1.jpg') }}" class="img-responsive desktop" alt="Slide 1">
                    <img src="{{ asset('site/img/slider/slide-1-mobile.jpg') }}" class="img-responsive mobile" alt="Slide 1">
                </div>
                <div class="item">
                    <img src="{{ asset('site/img/slider/slide-2.jpg') }}" class="img-responsive desktop" alt="Slide 2">
                    <img src="{{ asset('site/img/slider/slide-2-mobile.jpg') }}" class="img-responsive mobile" alt="Slide 2">
                </div>
                <div class="item">
                    <img src="{{ asset('site/img/slider/slide-3.jpg') }}" class="img-responsive desktop" alt="Slide 3">
                    <img src="{{ asset('site/img/slider/slide-3-mobile.jpg') }}" class="img-responsive mobile" alt="Slide 3">
                </div>
                <div class="item">
                    <img src="{{ asset('site/img/slider/slide-4.jpg') }}" class="img-responsive desktop" alt="Slide 4">
                    <img src="{{ asset('site/img/slider/slide-4-mobile.jpg') }}" class="img-responsive mobile" alt="Slide 4">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="section home-welcome">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="content-area">
                    <h2>FOECHS Introduction</h2>
                    <p>Foreign Office Employees Cooperative Housing Society (FOECHS) was registered with the Cooperative Societies Department, Islamabad Capital Territory on 11 November 1984. The revised layout plan has been approved by RDA and No Objection Certificates (NOCs) obtained from all the concerned departments. </p>
                    <a href="{{ route('organization') }}" class="btn btn-more">read more</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="video-area">
                    <iframe src="https://www.youtube.com/embed/WfVCoqdBQUE" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="section home-facilities">
    <div class="container">
        <h2 class="text-center">Facilities & Amenities</h2>
        <p class="text-center">Here are the facilities & Amenities we provide to our society memebers.</p>

        <div class="row">

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/electricity.png') }}" class="img-responsive" alt="electricity">
                    <h4>Electricity</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/gas.png') }}" class="img-responsive" alt="gas">
                    <h4>Gas</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/internet.png') }}" class="img-responsive" alt="internet">
                    <h4>Fiber Internet</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/roads.png') }}" class="img-responsive" alt="roads">
                    <h4>Roads Network</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/masjid.png') }}" class="img-responsive" alt="masjid">
                    <h4>Masjid</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/school.png') }}" class="img-responsive" alt="school">
                    <h4>School</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/hospital.png') }}" class="img-responsive" alt="hospital">
                    <h4>Hospital</h4>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="item">
                    <img src="{{ asset('site/img/icons/parks.png') }}" class="img-responsive" alt="parks">
                    <h4>Parks</h4>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="clearfix"></div>

<div class="section home-stats">
    <div class="container">
        <div class="row">

            <div class="col-xs-4">
                <div class="item">
                    <img src="{{ asset('site/img/icons/area.png') }}" class="img-responsive" alt="area">
                    <h5>{{ $settings['kanals'] }}</h5>
                    <p>Kanals</p>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="item">
                    <img src="{{ asset('site/img/icons/plots.png') }}" class="img-responsive" alt="plots">
                    <h5>{{ $settings['plots'] }}</h5>
                    <p>Plots</p>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="item">
                    <img src="{{ asset('site/img/icons/users.png') }}" class="img-responsive" alt="users">
                    <h5>{{ $settings['members'] }}</h5>
                    <p>Members</p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="section home-committee">
    <div class="container">
        <h2 class="text-center">Management Committee</h2>
        <p class="text-center">Here are the elected members who are taking care of the society matters.</p>

        <div class="row">

            @foreach ($members as $member)
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="item">
                        <img src="{{ asset('uploads/members/'.$member->image) }}" class="img-responsive" alt="{{ $member->name }}">
                        <h3>{{ $member->name }}</h3>
                        <p>{{ $member->designation }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="section home-events">
    <div class="container">
        <h2 class="text-center">Recent Events</h2>
        <p class="text-center">Browse through the events we have scheduled as a society.</p>

        <div class="row">

            @foreach ($events as $event)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <a href="{{ route('single-event', $event->id) }}">
                        <div class="item">
                            <img src="{{ asset('uploads/events/'.$event->image) }}" class="img-responsive" alt="event">
                            <p><i class="fa fa-calendar"></i> {{ $event->schedule_date->format('d-m-Y') }}</p>
                            <h3>{{ $event->title }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

        <div class="text-center">
            <a href="{{ route('events') }}" class="btn btn-all btn-primary">View All Events</a>
        </div>

    </div>
</div>

<div class="clearfix"></div>

<div class="section home-tenders">
    <div class="container">
        <h2 class="text-center">Tenders & Procurements</h2>
        <p class="text-center">Browse through the tenders & procurements published in the newspapers for the development.</p>

        <div class="row">

            @if (count($tenders))
                @foreach ($tenders as $tender)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <a href="{{ asset('uploads/tenders/'.$tender->path) }}" class="with-caption image-link">
                            <div class="item">
                                <img src="{{ asset('uploads/tenders/'.$tender->path) }}" class="img-responsive" alt="{{ $tender->title }}">
                                <p><i class="fa fa-calendar"></i> {{ $tender->created_at->format('d-m-Y') }}</p>
                                <h3>{{ $tender->title }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="text-center">
                    <a href="{{ route('tenders-procurements') }}" class="btn btn-all btn-primary">View All</a>
                </div>

            @else
                <h3 class="text-center">No Tenders Found</h3>
            @endif

        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="section home-contact">
    <div class="container">
        <iframe
            src="{{ $settings['map_iframe'] }}"
            allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<div class="clearfix"></div>

<div class="section"></div>

<div class="clearfix"></div>

@endsection
