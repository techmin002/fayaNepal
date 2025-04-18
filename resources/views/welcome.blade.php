@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
{{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <section class="slider-section">
        <div class="slider-wrapper">
            <div id="main-slider" class="nivoSlider">
                @foreach ($data['sliders'] as $key => $slider)
                    <img
                        src="{{ asset('upload/images/sliders/' . $slider->image) }}"
                        alt="{{ $slider->alt_text ?? 'Slider Image' }}"
                        title="#slider-caption-{{ $key }}"
                        style="width: 1900px; height: 798.417px; object-fit: cover;"
                    />
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


   @include('frontend.pages.aboutus_section')
  @include('frontend.pages.comman_past_program')
  @include('frontend.pages.comman_publication')

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
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"><span class="wow cssanimation fadeInLeft">35%</span>
                            </div>
                        </div> --}}
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
    @if(isset($data['portfolio']))
    <section id="counter" class="counter-section">
        <div class="container">
            <div class="row">
                <!-- Right side - Facebook iframe -->
                <div class="col-md-6 xs-padding">
                    <div class="fb-page-wrap">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffaya.nepal%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId"
                            width="100%" height="500" style="border:none;overflow:hidden"
                            scrolling="no" frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                        </iframe>
                    </div>
                </div>
                <div id="fb-root"></div>
                <!-- Left side - Counter boxes -->
                <div class="col-md-6">
                    <ul class="row counters">
                        <li class="col-md-6 col-sm-6 sm-padding">
                            <div class="counter-content">
                                <i class="fa fa-inr"></i>
                                <h3 class="counter">{{ $data['portfolio']->portfolio }}</h3>
                                <h4 class="text-white">Portfolio</h4>
                            </div>
                        </li>
                        <li class="col-md-6 col-sm-6 sm-padding">
                            <div class="counter-content">
                                <i class="ti-face-smile"></i>
                                <h3 class="counter">{{ $data['portfolio']->beneficiary_direct }}</h3>
                                <h4 class="text-white">Beneficiary Direct</h4>
                            </div>
                        </li>
                        <li class="col-md-6 col-sm-6 sm-padding">
                            <div class="counter-content">
                                <i class="ti-user"></i>
                                <h3 class="counter">{{ $data['portfolio']->beneficiary_indirect }}</h3>
                                <h4 class="text-white">Beneficiary InDirect</h4>
                            </div>
                        </li>
                        <li class="col-md-6 col-sm-6 sm-padding">
                            <div class="counter-content">
                                <i class="ti-comments"></i>
                                <h3 class="counter">{{ $data['portfolio']->project }}</h3>
                                <h4 class="text-white">Project Portfolio</h4>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </section><!-- Counter Section -->
@endif

{{-- recent story include --}}
@include('frontend.pages.comman_story')

    <!-- Events Section -->
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
                    {{-- <p id="noticeModalContent"></p> <!-- Content -->
                    <a id="noticeImageLink" href="" target="_blank"> <!-- Image Link -->
                        <img id="noticeImage" src="" title="View Attachment" alt="Notice Image"
                            style="width: 80px; height:80px; display: none;"> View Attachments<!-- Image -->
                    </a> --}}

                </div>

            </div>
        </div>
    </div>

   <!-- Testimonial Section -->


   @include('frontend.pages.commann_feedback')
   @include('frontend.pages.comman_vollunter')
   @include('frontend.pages.donorlogo')
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
