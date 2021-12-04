@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Construction of House</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section construction-house">
        <div class="container">
            <h2>Standard Operating Procedure For Construction Of Houses</h2>

            <ol>
                <li>NOC of Construction is mandatory, Construction of any type without NOC will not be accepted. NOC for construction, electric meter connection and inspection check list for different stages of construction will be issued along with possession of plot.</li>
                <li>On construction of house, member will have to submit drawings for approval of society’s engineer and onward submission to RDA. Payment of fee will be charged on account of RDA Charges & services charges. </li>
                <li>During construction, violation of approved drawings will not be allowed.</li>
                <li>It is owner’s responsibility to contact society’s office at every inception stage and get approval of work done.</li>
                <li>Check list should be signed by site engineer of FOECHS at every stage. In case of work done on next stage without prior approval, a fine of PKR 50,000/- will be charged.</li>
                <li>Approved drawings are valid for 1 Year only, after completion of validity time member will have to submit application for extension.</li>
            </ol>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
