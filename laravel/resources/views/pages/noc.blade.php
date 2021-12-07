@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Society NOCs</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section nocs">
        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <a href="{{ asset('uploads/documents/61ae68ec8be4f.pdf') }}" target="_blank">
                        <div class="item" style="background-image: url({{ asset('img/noc/event.jpg') }});">
                            <div class="content-area">
                                <h4>NOC from RDA</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4">
                    <a href="{{ asset('uploads/documents/61ae691919e0a.pdf') }}" target="_blank">
                        <div class="item" style="background-image: url({{ asset('img/noc/event.jpg') }});">
                            <div class="content-area">
                                <h4>NOC from RDA Layout Plan</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4">
                    <a href="{{ asset('uploads/documents/61ae694062906.pdf') }}" target="_blank">
                        <div class="item" style="background-image: url({{ asset('img/noc/event.jpg') }});">
                            <div class="content-area">
                                <h4>NOC from AHQ</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4">
                    <a href="{{ asset('uploads/documents/61ae6976d3021.pdf') }}" target="_blank">
                        <div class="item" style="background-image: url({{ asset('img/noc/event.jpg') }});">
                            <div class="content-area">
                                <h4>NOC Environment</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4">
                    <a href="{{ asset('uploads/documents/61ae6998e2831.pdf') }}" target="_blank">
                        <div class="item" style="background-image: url({{ asset('img/noc/event.jpg') }});">
                            <div class="content-area">
                                <h4>NOC Civil Aviation</h4>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
