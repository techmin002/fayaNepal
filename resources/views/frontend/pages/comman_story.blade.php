<section class="stories-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <h2 class="display-4 font-weight-bold text-primary">Recent Stories</h2>
            <div class="heading-border mx-auto bg-gradient-primary"></div>
            <p class="lead text-muted">Let these stories inspire action, click through to read full story or find ways to make a difference!</p>
        </div>

        <!-- Stories Carousel Container -->
        <div class="stories-carousel-container position-relative">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="font-weight-bold text-dark">Latest Updates</h3>
                <button class="stories-view-all-btn" id="storiesViewAllBtn">
                    View All <i class="fas fa-arrow-right"></i>
                </button>
            </div>

            <!-- Owl Carousel Container with Custom Navigation -->
            <div class="stories-carousel-wrapper">
                <div class="owl-carousel stories-carousel">
                    @foreach ($data['stories'] as $story)
                    <div class="stories-item">
                        <div class="stories-card h-100">
                            <div class="stories-card-img-top position-relative overflow-hidden">
                                <img src="{{ asset('upload/images/advertisements/' . $story->image) }}"
                                     alt="{{ $story->title }}"
                                     class="img-fluid w-100 stories-fixed-image">
                                <div class="stories-card-overlay"></div>
                                <span class="stories-date">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($story->date)->format('M d, Y') }}
                                </span>
                            </div>
                            <div class="stories-card-body stories-fixed-body">
                                <h3 class="stories-card-title stories-fixed-title">
                                    <a href="{{ route('story.detail', $story->id) }}">{{ $story->title }}</a>
                                </h3>
                                <div class="stories-card-text stories-fixed-description">
                                    <p>{!! Str::limit(strip_tags($story->shortdescription), 120) !!}</p>
                                </div>
                                <a href="{{ route('story.detail', $story->id) }}" class="stories-read-more-link">
                                    Read Full Story <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Custom Navigation Arrows -->
                <div class="stories-carousel-nav">
                    <div class="stories-carousel-prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </div>
                    <div class="stories-carousel-next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Full View Popup -->
<div class="stories-full-view-slider" id="storiesFullViewSlider">
    <span class="stories-close-full-view" id="storiesCloseFullView">&times;</span>
    <div class="stories-full-view-container">
        <h2 class="text-center text-white mb-5">All Stories</h2>
        <div class="stories-full-view-carousel">
            @foreach ($data['stories'] as $story)
            <div class="stories-full-view-story">
                <div class="stories-full-view-img-top position-relative overflow-hidden">
                    <img src="{{ asset('upload/images/advertisements/' . $story->image) }}"
                         alt="{{ $story->title }}"
                         class="img-fluid w-100">
                    <div class="stories-full-view-overlay"></div>
                    <span class="stories-full-view-date">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        {{ \Carbon\Carbon::parse($story->date)->format('M d, Y') }}
                    </span>
                </div>
                <div class="stories-full-view-body">
                    <h3 class="stories-full-view-title">
                        <a href="{{ route('story.detail', $story->id) }}">{{ $story->title }}</a>
                    </h3>
                    <div class="stories-full-view-text">
                        <p>{!! strip_tags($story->shortdescription) !!}</p>
                    </div>
                    <a href="{{ route('story.detail', $story->id) }}" class="stories-full-view-read-more">
                        Read Full Story <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Stories Section Styling */
    .stories-section {
        padding: 80px 0;
    }

    .stories-carousel-container {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .stories-carousel-wrapper {
        position: relative;
    }

    .stories-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        background: white;
        margin: 0 10px;
    }

    .stories-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    .stories-fixed-image {
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .stories-card:hover .stories-fixed-image {
        transform: scale(1.05);
    }

    .stories-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.3), transparent 60%);
    }

    .stories-date {
        position: absolute;
        bottom: 15px;
        left: 15px;
        z-index: 2;
        color: white;
        background: rgba(0,0,0,0.5);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
    }

    .stories-fixed-body {
        padding: 25px;
    }

    .stories-card-title {
    font-size: 1.25rem;
    line-height: 1.6; /* This should match the line-height in .stories-fixed-title */
    margin-bottom: 0; /* Remove the bottom margin since we have it in .stories-fixed-title */
}

.stories-card-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

    .stories-card-title a:hover {
        color: #ff6b6b;
    }
    .stories-fixed-title {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 3.2em; /* Adjust this based on your line-height */
    line-height: 1.6; /* Should match your actual line-height */
    margin-bottom: 15px;
}
    .stories-fixed-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
        height: 4.8em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .stories-read-more-link {
        color: #ff6b6b;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .stories-read-more-link:hover {
        color: #ff5252;
        transform: translateX(5px);
    }

    /* Custom Carousel Navigation */
    .stories-carousel-nav {
        position: absolute;
        width: 100%;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }

    .stories-carousel-prev,
    .stories-carousel-next {
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

    .stories-carousel-prev {
        margin-left: -45px;
    }

    .stories-carousel-next {
        margin-right: -45px;
    }

    /* .stories-carousel-prev:hover,
    .stories-carousel-next:hover {
        background: #ff6b6b;
    } */

    .stories-carousel-prev:hover .carousel-control-prev-icon,
    .stories-carousel-next:hover .carousel-control-next-icon {
        filter: brightness(0) invert(1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
        background-size: 100%, 100%;
    }

    /* Hide default Owl Carousel navigation */
    .owl-carousel .owl-nav {
        display: none;
    }

    /* Full View Slider */
    .stories-full-view-slider {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.9);
        z-index: 1000;
        padding: 60px 20px;
        overflow-y: auto;
    }

    .stories-full-view-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .stories-close-full-view {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        z-index: 1001;
        transition: transform 0.3s ease;
    }

    .stories-close-full-view:hover {
        transform: scale(1.2);
    }

    .stories-full-view-carousel {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    .stories-full-view-story {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .stories-full-view-title {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 3.2em;
    line-height: 1.6;
    margin-bottom: 15px;
}

    .stories-full-view-story:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    .stories-full-view-story .stories-full-view-img-top {
        height: 250px;
        overflow: hidden;
    }

    .stories-full-view-story img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .stories-full-view-story:hover img {
        transform: scale(1.05);
    }

    .stories-full-view-story .stories-full-view-body {
        padding: 25px;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .stories-fixed-image {
            height: 200px;
        }
    }

    @media (max-width: 767px) {
    .stories-carousel-container {
        padding: 20px 15px;
    }

    .stories-card {
        margin: 0 5px;
    }

    .stories-fixed-image {
        height: 180px;
    }

    .stories-fixed-body {
        padding: 15px;
    }

    .stories-fixed-title {
        font-size: 1.1rem;
        min-height: 2.8em;
    }

    .stories-fixed-description {
        -webkit-line-clamp: 2;
        height: 3.6em;
        margin-bottom: 15px;
    }

    .stories-carousel-prev,
    .stories-carousel-next {
        width: 35px;
        height: 35px;
    }

    .stories-carousel-prev {
        margin-left: -30px;
    }

    .stories-carousel-next {
        margin-right: -30px;
    }
}

    /* Keep your existing description adjustments */
    .stories-fixed-description {
        height: 3.6em;
        -webkit-line-clamp: 2;
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
        var owl = $('.stories-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false, // Disable default navigation
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1 // Only 1 item on mobile (0-575px)
            },
            576: {
                items: 1 // Still 1 item on small devices (576-767px)
            },
            768: {
                items: 2 // 2 items on tablets (768-991px)
            },
            992: {
                items: 3 // 3 items on desktop (992px+)
            }
        }
    });

        // Custom navigation
        $('.stories-carousel-prev').click(function() {
            owl.trigger('prev.owl.carousel');
        });

        $('.stories-carousel-next').click(function() {
            owl.trigger('next.owl.carousel');
        });

        // View All functionality
        const storiesViewAllBtn = document.getElementById('storiesViewAllBtn');
        const storiesFullViewSlider = document.getElementById('storiesFullViewSlider');
        const storiesCloseFullView = document.getElementById('storiesCloseFullView');

        storiesViewAllBtn.addEventListener('click', function() {
            storiesFullViewSlider.style.display = 'block';
            document.body.style.overflow = 'hidden';
            owl.trigger('stop.owl.autoplay');
        });

        storiesCloseFullView.addEventListener('click', function() {
            storiesFullViewSlider.style.display = 'none';
            document.body.style.overflow = 'auto';
            owl.trigger('play.owl.autoplay', [5000]);
        });

        // Close full view when clicking outside content
        storiesFullViewSlider.addEventListener('click', function(e) {
            if (e.target === storiesFullViewSlider) {
                storiesFullViewSlider.style.display = 'none';
                document.body.style.overflow = 'auto';
                owl.trigger('play.owl.autoplay', [5000]);
            }
        });
    });
</script>
