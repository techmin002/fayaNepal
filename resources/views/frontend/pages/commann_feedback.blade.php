<style>
    /* Testimonial Card Styling */
    .testimonial-item {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin: 15px;
        height: 280px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .testimonial-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .testimonial-content {
        flex-grow: 1;
        position: relative;
    }

    .testimonial-text {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5;
        font-size: 15px;
        color: #555;
        margin-bottom: 15px;
        min-height: 96px;
    }

    .read-more-btn {
        color: #3a86ff;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        display: inline-block;
        margin-top: -10px;
        transition: all 0.2s ease;
    }

    .read-more-btn:hover {
        color: #2667cc;
        text-decoration: underline;
    }

    .testi-footer {
        display: flex;
        align-items: center;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .testi-footer img {
        width: 50px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #f8f9fa;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Popup Styling */
    .testimonial-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s;
    }

    .popup-content {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        max-width: 600px;
        width: 90%;
        position: relative;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        animation: slideUp 0.4s;
    }

    .popup-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .popup-header img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 20px;
        border: 3px solid #f8f9fa;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .popup-header-text h3 {
        margin: 0 0 5px 0;
        color: #333;
    }

    .popup-header-text span {
        color: #777;
        font-size: 14px;
    }

    .popup-message {
        line-height: 1.7;
        color: #555;
    }

    .close-popup {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
        color: #888;
        transition: all 0.2s;
    }

    .close-popup:hover {
        color: #333;
    }
</style>

<section class="testimonial-section bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-40">
            <h2>What People Say</h2>
            <span class="heading-border"></span>
            <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
        </div>

        <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
            @foreach ($data['testimonials'] as $testimonial)
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="testimonial-text">
                            {!! $testimonial->message !!}
                        </div>
                        @if(strlen(strip_tags($testimonial->message)) > 200)
                            <span class="read-more-btn" onclick="openTestimonialPopup('{{ $testimonial->name }}', '{{ $testimonial->designation }}', '{{ asset('upload/images/testimonials/' . $testimonial->image) }}', `{!! $testimonial->message !!}`)">Read More</span>
                        @endif
                    </div>
                    <div class="testi-footer">
                        <img src="{{ asset('upload/images/testimonials/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="profile-image" >
                        <div>
                            <h4>{{ $testimonial->name }} <span>{{ $testimonial->designation }}</span></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonial Popup -->
<div class="testimonial-popup" id="testimonialPopup">
    <div class="popup-content">
        <span class="close-popup" onclick="closeTestimonialPopup()">&times;</span>
        <div class="popup-body">
            <div class="popup-header">
                <img id="popupImage" src="" alt="" class="popup-profile-image">
                <div class="popup-header-text">
                    <h3 id="popupName"></h3>
                    <span id="popupDesignation"></span>
                </div>
            </div>
            <div class="popup-message" id="popupMessage"></div>
        </div>
    </div>
</div>

<script>
    function openTestimonialPopup(name, designation, image, message) {
        document.getElementById('popupName').textContent = name;
        document.getElementById('popupDesignation').textContent = designation;
        document.getElementById('popupImage').src = image;
        document.getElementById('popupImage').alt = name;
        document.getElementById('popupMessage').innerHTML = message;
        document.getElementById('testimonialPopup').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeTestimonialPopup() {
        document.getElementById('testimonialPopup').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('testimonialPopup')) {
            closeTestimonialPopup();
        }
    }
</script>