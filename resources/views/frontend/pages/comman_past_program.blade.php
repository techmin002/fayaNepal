<section class="programs-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <h2 class="display-4 font-weight-bold text-primary">Our Impactful Programs</h2>
            <div class="heading-border mx-auto bg-gradient-primary"></div>
            <p class="lead text-muted max-w-3xl mx-auto">"FAYA NEPAL'S initiatives address systemic challeges through advocacy, inclusivily. innovation and community engagement.
                Each program empowers Children, youth, adolescents, women, ethic minorities, older people, people with disability, marginalized and underserved
                population by equipping them with the tolls, network and confidence needed to create lasting change in their lives and communities"</p>
        </div>

        <!-- Premium Carousel Slider with Custom Navigation -->
        <div class="programs-carousel-container position-relative">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="font-weight-bold text-dark">Featured Initiatives</h3>
                <a href="{{ route('frontend.pastproject') }}" class="btn btn-primary btn-sm rounded-pill px-4">
                    View All Programs <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Owl Carousel Container -->
            <div class="programs-carousel-wrapper">
                <div class="owl-carousel programs-carousel">
                    @foreach ($data['pastProgram']->take(9) as $program)
                    <div class="program-item">
                        <div class="program-card h-100">
                            <div class="card-img-top position-relative overflow-hidden">
                                <img src="{{ asset('upload/images/services/' . $program->image) }}"
                                     alt="{{ $program->title }}"
                                     class="img-fluid w-100 fixed-image-height">
                                <div class="card-overlay"></div>
                                <div class="progress-percentage">
                                    <span class="percentage-badge">{{ $program->icon ?? 100 }}% complete</span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar bg-white"
                                             style="width: {{ $program->icon ?? 100 }}%">
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="donate-btn btn btn-danger rounded-pill px-3">
                                    <i class="fas fa-heart mr-2"></i> Donate
                                </a>
                            </div>
                            <div class="card-body fixed-card-body">
                                <h4 class="card-title font-weight-bold text-truncate">{{ $program->title }}</h4>
                                <div class="card-text fixed-description">
                                    <p class="mb-0">{!! Str::limit(strip_tags($program->shortdescription), 120) !!}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('program.detail', $program->slug) }}"
                                       class="btn btn-outline-primary btn-sm rounded-pill">
                                        View Details
                                    </a>
                                    <span class="text-muted small">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($program->created_at)->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Custom Navigation Arrows -->
                <div class="programs-carousel-nav">
                    <div class="programs-carousel-prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </div>
                    <div class="programs-carousel-next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Modern Styling with Fixed Sizes */
    .programs-section {
        padding: 80px 0;
    }

    .heading-border {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #ff6b6b, #ff8e8e);
        margin: 20px auto;
    }

    .programs-carousel-container {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .programs-carousel-wrapper {
        position: relative;
    }

    .program-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        background: white;
        margin: 0 10px;
        height: 100%;
    }

    .program-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    .fixed-image-height {
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .program-card:hover .fixed-image-height {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent 50%);
    }

    .progress-container {
        position: absolute;
        bottom: 50px;
        left: 20px;
        right: 20px;
        z-index: 2;
    }

    .progress-bar-container {
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
        height: 6px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        border-radius: 10px;
    }

    .progress-percentage {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 3;
    }

    .percentage-badge {
        background: rgba(0,0,0,0.6);
        color: white;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .donate-btn {
        position: absolute;
        bottom: 15px;
        right: 15px;
        z-index: 3;
        background: #ff6b6b;
        border: none;
        font-size: 12px;
        padding: 5px 12px;
    }

    .fixed-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title {
        color: #333;
        margin-bottom: 15px;
        font-size: 1.1rem;
        height: 2.4em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .fixed-description {
        flex-grow: 1;
        margin-bottom: 15px;
        color: #666;
        line-height: 1.6;
        height: 4.8em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    /* Custom Carousel Navigation */
    .programs-carousel-nav {
        position: absolute;
        width: 100%;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }

    .programs-carousel-prev,
    .programs-carousel-next {
        width: 50px;
        height: 50px;
        background: #ff6b6b;
        border-radius: 50%;
        opacity: 1;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        cursor: pointer;
    }

    .programs-carousel-prev {
        margin-left: -45px;
    }

    .programs-carousel-next {
        margin-right: -45px;
    }

    /* .programs-carousel-prev:hover,
    .programs-carousel-next:hover {
        background: #ff6b6b;
    } */

    .programs-carousel-prev:hover .carousel-control-prev-icon,
    .programs-carousel-next:hover .carousel-control-next-icon {
        filter: brightness(0) invert(1);
    }

    /* Hide default Owl Carousel navigation */
    .owl-carousel .owl-nav {
        display: none;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .fixed-image-height {
            height: 200px;
        }
    }

    @media (max-width: 768px) {
        .fixed-description {
            height: 3.6em;
            -webkit-line-clamp: 2;
        }

        .programs-carousel-prev,
        .programs-carousel-next {
            width: 40px;
            height: 40px;
        }

        .programs-carousel-prev {
            margin-left: -25px;
        }

        .programs-carousel-next {
            margin-right: -25px;
        }
    }

    @media (max-width: 576px) {
        .programs-carousel-prev,
        .programs-carousel-next {
            width: 35px;
            height: 35px;
        }
    }
</style>

<!-- Required Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        // Initialize Owl Carousel
        var programsOwl = $('.programs-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false, // Disable default navigation
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });

        // Custom navigation
        $('.programs-carousel-prev').click(function() {
            programsOwl.trigger('prev.owl.carousel');
        });

        $('.programs-carousel-next').click(function() {
            programsOwl.trigger('next.owl.carousel');
        });

        // Adjust card heights to be equal
        function equalizeCardHeights() {
            var maxHeight = 0;
            $('.program-card').each(function() {
                $(this).css('height', 'auto');
                var thisHeight = $(this).outerHeight();
                if (thisHeight > maxHeight) {
                    maxHeight = thisHeight;
                }
            });
            $('.program-card').css('height', maxHeight + 'px');
        }

        // Run on load and window resize
        equalizeCardHeights();
        $(window).resize(function() {
            equalizeCardHeights();
        });
    });
</script>
