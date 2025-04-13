@extends('frontend.layouts.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Current Program</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Current Program</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    {{-- include current program --}}
    @include('frontend.pages.comman_current_program')


    <section class="campaigns-section bd-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 xs-padding">
                    <div class="campaigns-wrap">
                        <h4>Featured Campaigns</h4>
                        <h2>Featured project to built a School.</h2>
                        <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                            Sudurpashchim Province Nepal, the abused and the helpless.</p>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"><span class="wow cssanimation fadeInLeft">35%</span>
                            </div>
                        </div> --}}
                        {{-- <div class="donation-box">
                            <h3><i class="ti-bar-chart"></i>Goal: $450000</h3>
                            <h3><i class="ti-thumb-up"></i>Raised: $55000</h3>
                        </div> --}}
                        <a href="{{ url('donate') }}" class="default-btn">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="video-wrap">
                        <img src="{{ asset('frontend/img/video.jpg') }}" alt="video">
                        <div class="play">
                            <a class="img-popup" data-autoplay="true" data-vbtype="video"
                                href="https://www.youtube.com/watch?v=_IlLwfC2dNc"><i class="ti-control-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Featured Campaigns Section -->
<!-- Testimonial Section -->
@include('frontend.pages.comman_story')
@endsection
