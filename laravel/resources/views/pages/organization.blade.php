@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Organization</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section home-welcome">
        <div class="container">
            <div class="content-area">
                <h2>FOECHS Introduction</h2>
                <p>Foreign Office Employees Cooperative Housing Society (FOECHS) was registered with the Cooperative Societies Department, Islamabad Capital Territory on 11 November 1984. The revised layout plan has been approved by RDA and No Objection Certificates (NOCs) obtained from all the concerned departments. </p>
                <p>The Society is located adjacent to I-16 Sector of Islamabad in Village Lakhoo, Rupa, Nirhala and Kot Kollian District Rawalpindi at a distance of about 30 KM from the Ministry of Foreign Affairs, Islamabad and new Islamabad International Airport is about 10 KM and distance from Saddar Rawalpindi is about 12 kilometers. Society spread over an area measuring about 1800 kanals of land. The main access to the Society is from the I-16 sector of Islamabad.</p>
                <p>The Additional Secretary (Administration) (by designation), Ministry of Foreign Affairs is the President of the Society heading the Managing Committee consisting Vice President, Secretary, Treasurer and five members. The members of the Managing Committee are eligible to hold office for two consecutive terms of three years each. Current Managing Committee assumed the charge as per notification dated 10-02-2020. </p>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section about-video-area">
        <div class="container">
            <div class="video-area">
                <iframe src="https://www.youtube.com/embed/WfVCoqdBQUE" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
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
