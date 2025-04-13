
<style>
    /* Modern Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
    }

    .pager-header {
        background: linear-gradient(135deg, #0dcaf0 0%, #0b5ed7 100%);
        color: white;
        padding: 60px 0;
        text-align: center;
    }

    .page-content h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .page-content p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    /* Carousel Container */
    .carousel-container {
        position: relative;
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 40px;
    }

    .carousel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 0 10px;
    }

    .carousel-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .view-all-btn {
        background: linear-gradient(135deg, #0dcaf0 0%, #0b5ed7 100%);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
        box-shadow: 0 2px 10px rgba(13, 202, 240, 0.3);
        text-decoration: none;
    }

    .view-all-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(13, 202, 240, 0.4);
    }

    .view-all-btn i {
        margin-left: 5px;
    }

    /* Publication Carousel */
    .publication-carousel {
        display: flex;
        gap: 30px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        padding: 20px 0;
        scrollbar-width: none;
    }

    .publication-carousel::-webkit-scrollbar {
        display: none;
    }

    /* Full View Slider */
    .full-view-slider {
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

    .full-view-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .close-full-view {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        z-index: 1001;
    }

    .full-view-carousel {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    /* Publication Card - Modern Design */
    .publication-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex;
        flex-direction: column;
        height: 500px;
        min-width: 350px;
        scroll-snap-align: start;
    }

    .publication-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .card-image {
        height: 180px;
        overflow: hidden;
        position: relative;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .publication-card:hover .card-image img {
        transform: scale(1.05);
    }

    .card-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255,255,255,0.9);
        color: #0b5ed7;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .badge-number {
        background: #0b5ed7;
        color: white;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
        font-size: 11px;
    }

    .card-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: #2c3e50;
    }

    .card-description {
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
        overflow: hidden;
        position: relative;
    }

    .card-description::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 40px;
        background: linear-gradient(to bottom, rgba(255,255,255,0), white);
        transition: all 0.3s ease;
    }

    .card-description.expanded::after {
        opacity: 0;
        height: 0;
    }

    .card-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .read-more-btn {
        background: transparent;
        color: #0b5ed7;
        border: none;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 8px 0;
        transition: all 0.2s ease;
    }

    .read-more-btn:hover {
        color: #0a58ca;
    }

    .read-more-btn i {
        margin-left: 5px;
        transition: transform 0.2s ease;
    }

    .read-more-btn.active i {
        transform: rotate(180deg);
    }

    .download-btn {
        background: linear-gradient(135deg, #0dcaf0 0%, #0b5ed7 100%);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
        box-shadow: 0 2px 10px rgba(13, 202, 240, 0.3);
    }

    .download-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(13, 202, 240, 0.4);
    }

    .download-btn i {
        margin-right: 5px;
    }

    /* Navigation Arrows */
    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: #0b5ed7;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 10;
        transition: all 0.3s ease;
    }

    /* .carousel-nav:hover {
        background: #0b5ed7;
        color: white;
    } */

    .carousel-prev {
        left: 0;
    }

    .carousel-next {
        right: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .carousel-container {
            padding: 0 20px;
        }

        .publication-card {
            min-width: 300px;
            height: auto;
        }

        .carousel-nav {
            width: 40px;
            height: 40px;
        }

        .full-view-carousel {
            grid-template-columns: 1fr;
        }
    }
</style>



<div class="carousel-container">
    <div class="carousel-header">
        <h3 class="carousel-title">Featured Publications</h3>
        <button class="view-all-btn" id="viewAllBtn">
            View All <i class="fas fa-arrow-right"></i>
        </button>
    </div>

    <div class="publication-carousel" id="publicationCarousel">
        @foreach ($data['publications'] as $publication)
        <div class="publication-card">
            <div class="card-image">
                <img src="{{ asset('upload/images/publications/'.$publication->image) }}" alt="{{ $publication->title }}">
                <div class="card-badge">
                    <span class="badge-number">{{ $loop->iteration }}</span>
                    <span>Publication</span>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">{{ $publication->title }}</h3>
                <div class="card-description">
                    {!! $publication->description !!}
                </div>
                <div class="card-actions">
                    <button class="read-more-btn">
                        Read More <i class="fas fa-chevron-down"></i>
                    </button>
                    <a href="{{ asset('upload/images/publications/'.$publication->file) }}" class="download-btn" download>
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="carousel-nav carousel-prev" onclick="scrollCarousel(-1)">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="carousel-nav carousel-next" onclick="scrollCarousel(1)">
        <i class="fas fa-chevron-right"></i>
    </div>
</div>

<!-- Full View Slider -->
<div class="full-view-slider" id="fullViewSlider">
    <span class="close-full-view" id="closeFullView">&times;</span>
    <div class="full-view-container">
        <h2 class="text-white mb-4">All Publications</h2>
        <div class="full-view-carousel">
            @foreach ($data['publications'] as $publication)
            <div class="publication-card">
                <div class="card-image">
                    <img src="{{ asset('upload/images/publications/'.$publication->image) }}" alt="{{ $publication->title }}">
                    <div class="card-badge">
                        <span class="badge-number">{{ $loop->iteration }}</span>
                        <span>Publication</span>
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $publication->title }}</h3>
                    <div class="card-description">
                        {!! $publication->description !!}
                    </div>
                    <div class="card-actions">
                        <button class="read-more-btn">
                            Read More <i class="fas fa-chevron-down"></i>
                        </button>
                        <a href="{{ asset('upload/images/publications/'.$publication->file) }}" class="download-btn" download>
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreButtons = document.querySelectorAll('.read-more-btn');
        const carousel = document.getElementById('publicationCarousel');
        const viewAllBtn = document.getElementById('viewAllBtn');
        const fullViewSlider = document.getElementById('fullViewSlider');
        const closeFullView = document.getElementById('closeFullView');
        let autoScrollInterval;

        // Read More functionality
        readMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.publication-card');
                const description = card.querySelector('.card-description');

                description.classList.toggle('expanded');
                this.classList.toggle('active');

                if (description.classList.contains('expanded')) {
                    card.style.height = 'auto';
                    this.innerHTML = 'Show Less <i class="fas fa-chevron-up"></i>';
                } else {
                    card.style.height = '500px';
                    this.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
                }
            });
        });

        // Auto-scroll functionality
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                const carousel = document.getElementById('publicationCarousel');
                const scrollAmount = carousel.offsetWidth * 0.8;
                const maxScroll = carousel.scrollWidth - carousel.clientWidth;

                if (carousel.scrollLeft >= maxScroll - 10) {
                    carousel.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }, 5000); // Change slide every 5 seconds
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Start auto-scroll when page loads
        startAutoScroll();

        // Pause auto-scroll on hover
        carousel.addEventListener('mouseenter', stopAutoScroll);
        carousel.addEventListener('mouseleave', startAutoScroll);

        // View All functionality
        viewAllBtn.addEventListener('click', function() {
            fullViewSlider.style.display = 'block';
            document.body.style.overflow = 'hidden';
            stopAutoScroll();
        });

        closeFullView.addEventListener('click', function() {
            fullViewSlider.style.display = 'none';
            document.body.style.overflow = 'auto';
            startAutoScroll();
        });

        // Close full view when clicking outside content
        fullViewSlider.addEventListener('click', function(e) {
            if (e.target === fullViewSlider) {
                fullViewSlider.style.display = 'none';
                document.body.style.overflow = 'auto';
                startAutoScroll();
            }
        });
    });

    function scrollCarousel(direction) {
        const carousel = document.getElementById('publicationCarousel');
        const scrollAmount = carousel.offsetWidth * 0.8 * direction;
        carousel.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
</script>