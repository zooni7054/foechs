@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Tenders & Procurements</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section events-list">
        <div class="container">
            <p class="text-center">Browse through the tenders & procurements published in the newspapers for the development.</p>

            <div class="row">

                @if (count($tenders))

                    @foreach ($tenders as $tender)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="{{ route('single-tender', $tender->id) }}">
                                <div class="item">
                                    <img src="{{ asset('uploads/tenders/'.$tender->path) }}" class="img-responsive" alt="{{ $tender->title }}">
                                    <p><i class="fa fa-calendar"></i> {{ $tender->opening_date->format('d-m-Y') }} - <span style="color: #f00;">{{ $tender->closing_date->format('d-m-Y') }}</span></p>
                                    <h3>{{ $tender->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach

                @else
                    <h3 class="text-center">No Tenders Found</h3>
                @endif

            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section pagination">
        <div class="container">
            {{ $tenders->links() }}
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
