<div class="sponsor-section bd-bottom">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <h2>Donor's/Partner's</h2>
            <span class="heading-border"></span>
            <p class="sponsor-text">
                We sincerely appreciate our partners/donors for unwavering collaboration, technical expertise, and financial support since our inception. Your partnership has been instrumental in advancing our mission to create sustainable, transformative change in the lives of marginalized communities across Nepal.
                <br><br>
                We take immense pride in featuring your logos on our website, symbolizing the solidarity and shared commitment that drives our work. Each logo represents not just an organization but a promise of hope and progress for the communities we serve.
                <br><br>
                As we continue this journey, your dedication to global development and humanitarian values remains an inspiration. We eagerly anticipate strengthening our partnership and exploring new opportunities to amplify our collective impact.
            </p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="logo-slider-container">
                <div class="logo-slider-track">
                    @foreach ($data['pastpartners'] as $past)
                    <div class="logo-slide">
                        <img src="{{ asset('upload/images/partners/'.$past->logo)}}" alt="{{ $past->name }}" class="logo-img">
                    </div>
                    @endforeach

                    @foreach ($data['pastpartners'] as $past)
                    <div class="logo-slide">
                        <img src="{{ asset('upload/images/partners/'.$past->logo)}}" alt="{{ $past->name }}" class="logo-img">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Container Styling */
    .sponsor-text {
        font-size: 1rem;
        line-height: 1.6;
        text-align: justify;
        padding: 0 1rem;
    }

    /* Logo Slider Styles */
    .logo-slider-container {
        width: 100%;
        overflow: hidden;
        position: relative;
        margin: 40px 0;
    }

    .logo-slider-track {
        display: flex;
        animation: logoScroll 20s linear infinite;
        width: max-content;
    }

    .logo-slide {
        flex: 0 0 auto;
        padding: 0 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-img {
        height: 80px;
        width: auto;
        max-width: 180px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .logo-img:hover {
        transform: scale(1.05);
    }

    @keyframes logoScroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* ✅ Responsive Adjustments */
    @media (max-width: 768px) {
        .logo-slide {
            padding: 0 15px;
        }

        .logo-img {
            height: 60px;
            max-width: 120px;
        }

        .sponsor-text {
            font-size: 0.95rem;
            padding: 0 10px;
        }

        .section-heading h2 {
            font-size: 1.5rem;
        }

        .logo-slider-container {
            margin: 20px 0;
        }
    }

    @media (max-width: 480px) {
        .logo-img {
            height: 50px;
            max-width: 100px;
        }

        .sponsor-text {
            font-size: 0.9rem;
        }

        .section-heading h2 {
            font-size: 1.3rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.querySelector('.logo-slider-track');
        const slides = document.querySelectorAll('.logo-slide');

        if (slides.length > 0) {
            const slideWidth = slides[0].offsetWidth;
            const totalWidth = slideWidth * slides.length;
            const duration = totalWidth / 75; // Adjust scroll speed

            track.style.animationDuration = `${duration}s`;
        }
    });
</script>
