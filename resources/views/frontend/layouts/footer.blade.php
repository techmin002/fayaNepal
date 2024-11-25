@php
$companyProfile = Modules\Setting\Entities\CompanyProfile::first();
@endphp
<section class="widget-section padding">
    <div class="container">
        <div class="widget-wrap row">
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <img src="{{ asset('upload/images/settings/'.$companyProfile->logo) }}" alt="logo"
                        class="img-fluid faya-logo-main-footer">
                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                        Sudurpashchim Province Nepal</p>
                    <ul class="social-icon">
                        <li><a href="{{ $companyProfile->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $companyProfile->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $companyProfile->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $companyProfile->youtube }}"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{ $companyProfile->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <h3>Recent Campaigns</h3>
                    <ul class="widget-link">
                        @php($programs = Modules\Service\Entities\Program::where('program_type','past')->orderBy('created_at','DESC')->get())
                        @foreach ($programs->take('3') as $pro )
                        <li><a href="#">{{ $pro->title }} <span></span></a>
                        </li>
                        @endforeach
                        <li><a href="#"><span></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <h3>Faya Nepal Location</h3>
                    <ul class="address">
                        <li><i class="ti-email"></i> {{ $companyProfile->company_email }}</li>
                        <li><i class="ti-mobile"></i> {{ $companyProfile->company_phone }}</li>
                        <li><i class="ti-world"></i> www.fayanepal.org</li>
                        <li><i class="ti-location-pin"></i> {{ $companyProfile->company_address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- ./Widget Section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 sm-padding">
                <div class="copyright">&copy; 2024 Faya Nepal Powered by <a href="https://bginfotechs.com/">BG infotechs</a></div>
            </div>
            <div class="col-md-6 sm-padding">
                <ul class="footer-social">
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Report Problem</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- /Footer Section -->

<a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>

<!-- jQuery Lib -->
<script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
<!-- Tether JS -->
<script src="{{ asset('frontend/js/vendor/tether.min.js') }}"></script>
<!-- Imagesloaded JS -->
<script src="{{ asset('frontend/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<!-- OWL-Carousel JS -->
<script src="{{ asset('frontend/js/vendor/owl.carousel.min.js') }}"></script>
<!-- isotope JS -->
<script src="{{ asset('frontend/js/vendor/jquery.isotope.v3.0.2.js') }}"></script>
<!-- Smooth Scroll JS -->
<script src="{{ asset('frontend/js/vendor/smooth-scroll.min.js') }}"></script>
<!-- venobox JS -->
<script src="{{ asset('frontend/js/vendor/venobox.min.js') }}"></script>
<!-- ajaxchimp JS -->
<script src="{{ asset('frontend/js/vendor/jquery.ajaxchimp.min.js') }}"></script>
<!-- Counterup JS -->
<script src="{{ asset('frontend/js/vendor/jquery.counterup.min.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('frontend/js/vendor/jquery.waypoints.v2.0.3.min.js') }}"></script>
<!-- Slick Nav JS -->
<script src="{{ asset('frontend/js/vendor/jquery.slicknav.min.js') }}"></script>
<!-- Nivo Slider JS -->
<script src="{{ asset('frontend/js/vendor/jquery.nivo.slider.pack.js') }}"></script>
<!-- Letter Animation JS -->
<script src="{{ asset('frontend/js/vendor/letteranimation.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('frontend/js/vendor/wow.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('frontend/js/contact.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
