@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Forms & Documents</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section forms-documents">
        <div class="container">

            <div class="row">
                <div class="container">
                    <div class="col-md-6">
                        <h3>Documents</h3>
                        @foreach ($documents as $document)

                            <a href="{{ asset('uploads/documents/' . $document->path) }}" target="_blank" download="{{ $document->title }}.pdf">
                                <div class="item">
                                    <div class="content-area">
                                        <h4>{{ $document->title }}</h4>
                                    </div>
                                    <div class="icon-area">
                                        <i class="fa fa-download"></i> <span>Download</span>
                                    </div>
                                </div>
                            </a>

                        @endforeach

                    </div>

                    <div class="col-md-6">
                        <h3>Forms</h3>
                        @foreach ($forms as $form)

                            <a href="{{ asset('uploads/documents/' . $form->path) }}" target="_blank" download="{{ $form->title }}.pdf">
                                <div class="item">
                                    <div class="content-area">
                                        <h4>{{ $form->title }}</h4>
                                    </div>
                                    <div class="icon-area">
                                        <i class="fa fa-download"></i> <span>Download</span>
                                    </div>
                                </div>
                            </a>

                        @endforeach

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
