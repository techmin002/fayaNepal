@extends('frontend.layouts.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Current Events</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <section class="events-section bg-grey bd-bottom padding">
        <div class="container">
            <div id="event-carousel" class="events-wrap owl-Carousel">
                @foreach ($data['events'] as $event)
                <div class="events-item">
                    <div class="event-thumb">
                       <img src="{{ asset('upload/images/events/'.$event->image)}}" alt="events">
                    </div>
                    <div class="event-details">
                        <h3>{{ $event->title }}</h3>
                        <div class="event-info">
                            <p><i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($event->date)->format('d-M-Y') }}</p>
                            <p><i class="ti-location-pin"></i>{{ $event->title }}</p>
                        </div>
                        <p>{!! $event->shortdescription !!}</p>
                        <a href="{{ route('event.detail', $event->id) }}" class="default-btn">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
       </div>
        </section>
        <!-- Events Section -->
        <section class="cta-section d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                       <div class="cta-content">
                           <h2>Ready to Join With Us?</h2>
                            <p>The secret to happiness lies in helping others. Never underestimate the difference <br> the abused and the helpless.</p>
                       </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center text-right">
                        <a href="#" class="default-btn">Contact With Us</a>
                    </div>
               </div>
            </div>
        </section>
        <!-- Call To Action Section -->
        <section class="blog-section bg-grey bd-bottom padding">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Recent Stories</h2>
                    <span class="heading-border"></span>
                    <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
                </div>
                <!-- /Section Heading -->
                <div class="row">
                    <div class="col-lg-12 xs-padding">
                        <div class="blog-items grid-list row">
                            @foreach ($data['stories'] as $story)
                            <div class="col-md-4 padding-15">
                                <div class="blog-post">
                                    <img src="{{ asset('upload/images/advertisements/'.$story->image) }}" alt="blog post">
                                    <div class="blog-content">
                                        <span class="date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($story->date)->format('d-M-Y') }}</span>
                                        <h3><a href="{{ route('event.detail',$story->id) }}">{{ $story->title }}</a></h3>
                                        <p>{!! $story->shortdescription !!}</p>
                                        <a href="{{ route('event.detail',$story->id) }}" class="post-meta">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Blog Posts -->
                </div>
            </div>
        </section>
        
@endsection
