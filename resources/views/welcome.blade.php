@extends('frontend.layouts.master')
@section('content')
    <section class="slider-section">
        <div class="slider-wrapper">
            <div id="main-slider" class="nivoSlider">
                @foreach ($data['sliders'] as $key => $slider)
                    <img src="{{ asset('upload/images/sliders/' . $slider->image) }}" alt=""
                        title="#slider-caption-{{ $key }}" />
                @endforeach
            </div>

            @foreach ($data['sliders'] as $key => $slider)
                <div id="slider-caption-{{ $key }}" class="nivo-html-caption slider-caption">
                    <div class="display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="slider-text">
                                    <h5 class="wow cssanimation fadeInBottom">Join Us Today</h5>
                                    <h1 class="wow cssanimation leFadeInRight sequence">{{ $slider->title }}</h1>
                                    <p class="wow cssanimation fadeInTop" data-wow-delay="1s">
                                        {!! $slider->short_description !!}
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="default-btn wow cssanimation fadeInBottom"
                                        data-wow-delay="0.8s">Join With Us</a>
                                    <a href="{{ route('frontend.donate') }}" class="default-btn wow cssanimation fadeInBottom"
                                        data-wow-delay="0.8s">Donate Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <section class="promo-section bd-bottom">
        <div class="promo-wrap">
            <div class="container">
                <div class="row index-top-three">
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('frontend/img/icon-1.png') }}" alt="prmo icon">
                            <h3>About Us</h3>
                            <p>FAYA Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                                Sudurpashchim Province, Nepal. It is dedicated to empowering marginalized communities
                                through inclusive, rights-based initiatives</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('frontend/img/icon-2.png') }}" alt="prmo icon">
                            <h3>How We work</h3>
                            <p>We collaborate closely with governmental, non-governmental, private sectors, academic
                                institutions, and partner/donor agencies, all while centralizing a participatory,
                                inclusive, and human rights-based approach.</p>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('frontend/img/icon-3.png') }}" alt="prmo icon">
                            <h3>Mission Statement</h3>
                            <p>FAYA Nepal is dedicated to fostering sustainable development, aiming to create lasting
                                positive change in communities. Our mission is to drive prosperity through inclusive and
                                impactful initiatives.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Promo Section -->

    <section class="causes-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Current Program</h2>
                <span class="heading-border"></span>
                <p>"FAYA Nepal is driving initiatives aimed at improving maternal and child health, enhancing public
                    health measures, and empowering marginalized communities. The organization also focuses on
                    strengthening leadership and advocacy skills among women and marginalized groups, fostering
                    inclusive and sustainable development."</p>
            </div><!-- /Section Heading -->
            <div class="causes-wrap row">
                @foreach ($data['currentProgram'] as $program)
                    <div class="col-md-4 xs-padding">
                        <div class="causes-content">
                            <div class="causes-thumb">
                                <img src="{{ asset('upload/images/services/' . $program->image) }}" alt="causes">
                                <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                                <div class="progress">
                                    @if (is_int($program->icon) && $program->icon >= 15)
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
                        <h2>Story of Khairala Health Post part-one</h2>
                        <p>"Khairala, located in Ward No. 2 of Chure Rural Municipality, faces significant challenges in
                            accessing healthcare. The local population struggles with inadequate health facility
                            buildings, and the remoteness of the area makes it difficult for residents to receive
                            essential health services."</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"><span class="wow cssanimation fadeInLeft">35%</span>
                            </div>
                        </div>
                        <a href="#" class="default-btn">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="video-wrap">
                        <img src="{{ asset('frontend/image/event/heltpost.jpg') }}" alt="video">
                        <div class="play">
                            <a class="img-popup" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/AVW3BOwOyJs?si=xUrRGGJ3ap399i9p"><i class="ti-control-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Featured Campaigns Section -->
    <section id="counter" class="counter-section">
        <div class="container">
            <ul class="row counters">
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-money"></i>
                        <h3 class="counter">85389</h3>
                        <h4 class="text-white">Portfolio</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-face-smile"></i>
                        <h3 class="counter">10693</h3>
                        <h4 class="text-white">Beneficiary Direct</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-user"></i>
                        <h3 class="counter">50177</h3>
                        <h4 class="text-white">Beneficiary InDirect</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-comments"></i>
                        <h3 class="counter">669</h3>
                        <h4 class="text-white">Project Portfolio</h4>
                    </div>
                </li>
            </ul>
        </div>
    </section><!-- Counter Section -->

    <section class="events-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Past Program</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div id="event-carousel" class="events-wrap owl-Carousel">
                @foreach ($data['pastProgram'] as $pprogram)
                    <div class="events-item">
                        <div class="event-thumb">
                            <img src="{{ asset('upload/images/services/' . $pprogram->image) }}" alt="events">
                        </div>
                        <div class="event-details">
                            <h3>{{ $pprogram->title }}</h3>
                            <div class="event-info">
                                <p><i class="ti-calendar"></i>{{ $pprogram->date }}</p>
                                <p><i class="ti-location-pin"></i>{{ $pprogram->icon }}</p>
                            </div>
                            <p>{!! $pprogram->shortdescription !!}</p>
                            <a href="{{ route('program.detail', $program->slug) }}" class="default-btn">Read More</a>
                        </div>
                    </div><!-- Event-1 -->
                @endforeach
            </div>
        </div>
    </section><!-- Events Section -->
    {{-- modal for notice --}}
    <!-- Notice Modal -->
    <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noticeModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" title="Close Notice" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Title -->
                    <p id="noticeModalContent"></p> <!-- Content -->
                    <a id="noticeImageLink" href="" target="_blank"> <!-- Image Link -->
                        <img id="noticeImage" src="" title="View Attachment" alt="Notice Image"
                            style="width: 80px; height:80px; display: none;"> View Attachments<!-- Image -->
                    </a>

                </div>

            </div>
        </div>
    </div>

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
                                    <img src="{{ asset('upload/images/advertisements/' . $story->image) }}"
                                        alt="blog post">
                                    <div class="blog-content">
                                        <span class="date"><i class="fa fa-clock-o"></i> {{ $story->date }}</span>
                                        <h3><a href="{{ route('story.detail', $story->id) }}">{{ $story->title }}</a>
                                        </h3>
                                        <p>{!! $story->shortdescription !!}</p>
                                        <a href="{{ route('story.detail', $story->id) }}" class="post-meta">Read More</a>
                                    </div>
                                </div>
                            </div><!-- Post 1 -->
                        @endforeach
                    </div>
                </div><!-- Blog Posts -->
            </div>
        </div>
    </section><!-- Blog Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchNotice();

            function fetchNotice() {
                $.ajax({
                    url: "{{ route('fetch.notice') }}", // Laravel route for fetching notice
                    method: "GET",
                    success: function(response) {
                        if (response) {
                            // Populate modal with title, content, and image
                            document.getElementById("noticeModalTitle").textContent = response.title;
                            document.getElementById("noticeModalContent").textContent = response
                                .content;

                            if (response.image_url) {
                                // Set image link and display the image
                                const noticeImageLink = document.getElementById("noticeImageLink");
                                const noticeImage = document.getElementById("noticeImage");
                                noticeImageLink.href = response.image_url;
                                noticeImage.src = response.image_url;
                                noticeImage.style.display = "block";
                            }

                            // Show the modal
                            let noticeModal = new bootstrap.Modal(document.getElementById(
                                "noticeModal"));
                            noticeModal.show();
                        } else {
                            console.log("No active notices to display.");
                        }
                    },
                    error: function() {
                        console.error("Failed to fetch the notice.");
                    },
                });
            }
        });
    </script>
@endsection
