
<div class="sponsor-section bd-bottom">
    <div class="container">
        <div class="section-heading text-center mb-40">
            <h2>Donor's/Partner's</h2>
            <span class="heading-border"></span>
            <p>"FAYA Nepal collaborates with various grassroots organizations and development allies to enhance its impact and drive sustainable social change. These strategic partnerships empower FAYA to amplify its efforts in promoting equality, human rights, and community development."</p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row main-container-down align-items-center h-100">
        <div class="container-unique rounded">
            <!-- Logo Slider Section -->
            <div class="logo-slider-container">
                <div class="logo-slider-track">
                    @foreach ($data['pastpartners'] as $past)
                    <div class="logo-slide">

                        {{-- <img
                        src="{{ asset('upload/images/partners/'.$past->image) }}"
                        alt="{{ $past->name }}"
                        style="width: 150px; height: 84px; object-fit: cover;"> --}}

                        <img src="{{ asset('upload/images/partners/'.$past->logo)}}" alt="{{ $past->name }}" class="logo-img" >
                    </div>
                    @endforeach
                    <!-- Duplicate slides for seamless looping -->
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

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .logo-slide {
            padding: 0 15px;
        }
        .logo-img {
            height: 60px;
            max-width: 120px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Adjust animation speed based on content length
        const track = document.querySelector('.logo-slider-track');
        const slides = document.querySelectorAll('.logo-slide');

        if (slides.length > 0) {
            const slideWidth = slides[0].offsetWidth;
            const totalWidth = slideWidth * slides.length;
            const duration = totalWidth / 75; // Adjust for speed (higher = slower)

            track.style.animationDuration = `${duration}s`;
        }
    });
</script>
