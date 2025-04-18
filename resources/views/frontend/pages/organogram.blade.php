@extends('frontend.layouts.master')
@section('content')
    <style>
        .event_date {
            width: 82px;
            background: #004aad;
            float: left;
            text-align: center;
            border-radius: 2px;
            color: #ffff;
            margin-top: 30px
        }

        .event-date-wrap {
            border: 1px dashed #01923f;
            margin: 8px;
            padding: 4px 0;
        }

        .event-date-wrap p {
            font-size: 23px;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .event-date-wrap span {
            color: #fff;
            font-weight: 700;
            font-size: 14px;
        }

        .date-description {
            margin-left: 115px;
        }

        .date-description h3 {
            margin-top: 0;
            font-weight: 800;
            position: relative;
            color: #004aad;
            font-size: 28px
        }

        .main-top-div {
            border-style: outset;
        }

        .notice {
            margin-top: 20px;
        }

        .notice-board-h2 {
            margin-top: 30px !important
        }

        .main-top-div {
            padding-bottom: 20px
        }

        /* css start with btn from here  */
        .neu-btn {
            width: 170px;
            height: 30px;
            font-family: 'Raleway';
            font-size: large;
            border-radius: 20px;
            border: none;
            box-shadow: 8px 8px 12px rgba(0, 0, 0, 0.25),
                -8px -8px 12px rgba(255, 255, 255, 0.3);
            cursor: pointer;
        }

        .neu-btn:hover {
            box-shadow: 8px 8px 12px rgba(0, 0, 0, 0.25) inset,
                -8px -8px 12px rgba(255, 255, 255, 0.3) inset;
        }

        /* New CSS for image container */
        .card-body {
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-body img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        /* If you want to set specific maximum dimensions */
        .card {
            max-width: 1300px; /* or whatever maximum width you prefer */
            margin: 0 auto;
        }

        /* Optional: Add some padding around the image */
        .card-body {
            padding: 20px;
        }
    </style>
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Organograms</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Organograms </li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <!-- body -->
    <div class="sponsor-section bd-bottom">
        <div class="container">
            <div class="section-heading text-center mb-40 main-top-div">
                <h2 class='notice-board-h2'>Organograms</h2>
                <span class="heading-border"></span>
                <div class="notice">
                    <div class="container">
                        <div class="row">
                            @foreach ($organograms as $notice)
    @if($notice->status == 'on')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $notice->title }}</h5>
                </div>
                <div class="card-body">
                    <img src="{{ asset('upload/images/organograms/'.$notice->image) }}" alt="{{ $notice->title }}">
                </div>
            </div>
        </div>
    @endif
@endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection