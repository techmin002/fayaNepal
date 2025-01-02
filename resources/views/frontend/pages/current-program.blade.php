@extends('frontend.layouts.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Current Program</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="causes-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="causes-wrap row">
               <div class="col-md-12">
                <div class="section-heading text-center mb-40">
                    <h2>Current Programs</h2>
                    <span class="heading-border"></span>
                </div><!-- /Section Heading -->
               </div>
               <hr>
               @foreach ($data['programs'] as $program)
               <div class="col-md-4 xs-padding mt-3">
                   <div class="causes-content">
                       <div class="causes-thumb">
                           <img src="{{ asset('upload/images/services/' . $program->image) }}" alt="causes">
                           <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                           <div class="progress">
                               
                               @if($program->icon)
                                   @php
                                       $progress = 'style=width:' . $program->icon . '%';
                                      $per =  $program->icon;
                                   @endphp
                               @else
                                   @php
                                       $progress = 'style=width:100%';
                                       $per =  100;
                                   @endphp
                               @endif

                               <div class="progress-bar" role="progressbar" {{ $progress }}
                                   aria-valuenow="{{ $per }}" aria-valuemin="0"
                                   aria-valuemax="{{ $per }}">
                                   <span class="wow cssanimation fadeInLeft">{{ $per }}%</span>
                               </div>
                           </div>
                       </div>
                       <div class="causes-details">
                           <h3>{{ $program->title }}</h3>
                           <p>{!! $program->shortdescription !!}</p>
                           <a href="{{ route('program.detail', $program->slug) }}" class="read-more">Read More</a>
                       </div>
                   </div>
               </div><!-- /Program-1 -->
           @endforeach
            </div>
        </div>
    </section><!-- /Program Section -->

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

    <section class="testimonial-section bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>What People Say</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
                @foreach ($data['testimonials'] as $testimonial)
                    <div class="testimonial-item">
                        <p>{!! $testimonial->message !!}</p>
                        <div class="testi-footer">
                            <img src="{{ asset('upload/images/testimonials/' . $testimonial->image) }}" alt="profile">
                            <h4>{{ $testimonial->name }} <span>{{ $testimonial->designation }}</span></h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!-- Testimonial Section -->

    <section class="blog-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Recent Stories</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div class="row">
                <div class="col-lg-12 xs-padding">
                    <div class="blog-items grid-list row">
                        @foreach ($data['stories'] as $story)
                            <div class="col-md-4 padding-15">
                                <div class="blog-post">
                                    <img src="{{ asset('upload/images/advertisements/' . $story->image) }}" alt="blog post">
                                    <div class="blog-content">
                                        <span class="date"><i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($story->date)->format('d-M-Y') }}</span>
                                        <h3><a href="#">{{ $story->title }}</a></h3>
                                        <p>{!! $story->description !!}</p>
                                        <a href="#" class="post-meta">Read More</a>
                                    </div>
                                </div>
                            </div><!-- Post 1 -->
                        @endforeach
                    </div>
                </div><!-- Blog Posts -->
            </div>
        </div>
    </section><!-- Blog Section -->

    {{-- <div class="sponsor-section bd-bottom">
        <div class="container">
            <ul id="sponsor-carousel" class="sponsor-items owl-carousel">
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-1.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-2.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-3.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-4.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-5.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-6.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-7.png') }}" alt="sponsor-image">
                </li>
                <li class="sponsor-item">
                    <img src="{{ asset('frontend/img/sponsor-8.png') }}" alt="sponsor-image">
                </li>
            </ul>
        </div>
    </div> --}}
    <!-- ./Sponsor Section -->
@endsection
