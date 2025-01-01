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
    </style>
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Procurements</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Procurements </li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <!-- body -->
    <div class="sponsor-section bd-bottom">
        <div class="container">
            <div class="section-heading text-center mb-40 main-top-div">
                <h2 class='notice-board-h2'>Procurements</h2>
                <span class="heading-border"></span>
                <div class="notice">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($procurements as $notice)
                                    
                               
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>{{ \Carbon\Carbon::parse($notice->created_at)->format('d') }}</p>
                                        <span>{{ \Carbon\Carbon::parse($notice->created_at)->format('M.y') }}</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>{{ $notice->title }}</h3>
                                    <p>{!! $notice->description !!}</p>
                                    <a type="button" href="{{ asset('upload/images/procurement/'.$notice->image) }}" target="_blank" class="neu-btn">View Attachment</a>
                                    <hr class="event_line">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
