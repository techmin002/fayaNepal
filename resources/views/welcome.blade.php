@extends('frontend.layouts.master')
@section('content')


   

    <section class="slider-section">
        <div class="slider-wrapper">
            <div id="main-slider" class="nivoSlider">
                <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="" title="#slider-caption-1" />
                <img src="{{ asset('frontend/img/slider-2.jpg') }}" alt="" title="#slider-caption-2" />
                <img src="{{ asset('frontend/img/slider-3.jpg') }}" alt="" title="#slider-caption-3" />
            </div><!-- /#main-slider -->

            <div id="slider-caption-1" class="nivo-html-caption slider-caption">
                <div class="display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="slider-text">
                                <h5 class="wow cssanimation fadeInBottom">Join Us Today</h5>
                                <h1 class="wow cssanimation leFadeInRight sequence">Better Life for People</h1>
                                <p class="wow cssanimation fadeInTop" data-wow-delay="1s">Help today because tomorrow
                                    you may be the one who needs helping! <br>Forget what you can get and see what you
                                    can give.</p>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Join With Us</a>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Donet Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /#slider-caption-1 -->
            <div id="slider-caption-2" class="nivo-html-caption slider-caption">
                <div class="display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="slider-text">
                                <h1 class="wow cssanimation fadeInTop" data-wow-delay="1s" data-wow-duration="800ms">
                                    Together we <br>can make a Difference</h1>
                                <p class="wow cssanimation fadeInBottom" data-wow-delay="1s">Help today because
                                    tomorrow you may be the one who needs helping! <br>Forget what you can get and see
                                    what you can give.</p>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Join With Us</a>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Donet Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /#slider-caption-2 -->
            <div id="slider-caption-3" class="nivo-html-caption slider-caption">
                <div class="display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="slider-text">
                                <h5 class="wow cssanimation fadeInBottom">Join Us Today</h5>
                                <h1 class="wow cssanimation lePushReleaseFrom sequence" data-wow-delay="1s">Give a
                                    little. Change a lot.</h1>
                                <p class="wow cssanimation fadeInTop" data-wow-delay="1s">Help today because tomorrow
                                    you may be the one who needs helping! <br>Forget what you can get and see what you
                                    can give.</p>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Join With Us</a>
                                <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                    data-wow-delay="0.8s">Donet Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /#slider-caption-3 -->
        </div>
    </section><!-- /#slider-Section -->

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
                <div class="col-md-4 xs-padding">
                    <div class="causes-content">
                        <div class="causes-thumb">
                            <img src="{{ asset('frontend/image/event/LeadingCapacity.png') }}" alt="causes">
                            <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"><span
                                        class="wow cssanimation fadeInLeft">25%</span></div>
                            </div>
                        </div>
                        <div class="causes-details">
                            <h3>Leading Capacity Strengthening Support Programs</h3>
                            <p>The Sudurpashchim province operates under a federal system, aiming to distribute power
                                between central and provincial governments for localized governance.</p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div><!-- /Program-1 -->
                <div class="col-md-4 xs-padding">
                    <div class="causes-content">
                        <div class="causes-thumb">
                            <img src="{{ asset('frontend/image/event/imgg.png') }}" alt="causes">
                            <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"><span
                                        class="wow cssanimation fadeInLeft">45%</span></div>
                            </div>
                        </div>
                        <div class="causes-details">
                            <h3>Enhancing Cholera Control In Nepal</h3>
                            <p>Nepal is characterized by endemic cholera and the potential for significant outbreaks.
                                Although 93 percent of households in Nepal utilize improved sources of drinking water,
                            </p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div><!-- /Program-2 -->
                <div class="col-md-4 xs-padding">
                    <div class="causes-content">
                        <div class="causes-thumb">
                            <img src="{{ asset('frontend/image/event/mother.png') }}" alt="causes">
                            <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"><span
                                        class="wow cssanimation fadeInLeft">75%</span></div>
                            </div>
                        </div>
                        <div class="causes-details">
                            <h3>Improving Health Seeking Behavior of Mothers and Children</h3>
                            <p>Enhancing the health behavior of mothers and children represents a crucial initiative
                                aimed at addressing disparities in maternal and child health, ultimately securing the
                                wellbeing. </p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div><!-- /Program-3 -->
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
                                aria-valuemin="0" aria-valuemax="100"><span
                                    class="wow cssanimation fadeInLeft">35%</span></div>
                        </div>
                        <a href="#" class="default-btn">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="video-wrap">
                        <img src="{{ asset('frontend/image/event/heltpost.jpg') }}" alt="video">
                        <div class="play">
                            <a class="img-popup" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/AVW3BOwOyJs?si=xUrRGGJ3ap399i9p"><i
                                    class="ti-control-play"></i></a>
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
                        <h4 class="text-white">Money Donated</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-face-smile"></i>
                        <h3 class="counter">10693</h3>
                        <h4 class="text-white">Volunteer Around The World</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-user"></i>
                        <h3 class="counter">50177</h3>
                        <h4 class="text-white">People Impacted</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-comments"></i>
                        <h3 class="counter">669</h3>
                        <h4 class="text-white">Positive Feedbacks</h4>
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
                <div class="events-item">
                    <div class="event-thumb">
                        <img src="{{ asset('frontend/image/pastevent/covidimg.png') }}" alt="events">
                    </div>
                    <div class="event-details">
                        <h3>Support to local planning and response against COVID 19</h3>
                        <div class="event-info">
                            <p><i class="ti-calendar"></i>Oct 28, 2023</p>
                            <p><i class="ti-location-pin"></i>Dhangadhi Sub-Metropolis-01</p>
                        </div>
                        <p>Help today because tomorrow you may be the one who</p>
                        <a href="#" class="default-btn">Read More</a>
                    </div>
                </div><!-- Event-1 -->
                <div class="events-item">
                    <div class="event-thumb">
                        <img src="{{ asset('frontend/image/pastevent/secondary.png') }}" alt="events">
                    </div>
                    <div class="event-details">
                        <h3>Strengthening Safe Abortion Ecosystem Nepal</h3>
                        <div class="event-info">
                            <p><i class="ti-calendar"></i>Oct 28, 2023</p>
                            <p><i class="ti-location-pin"></i>Dhangadhi Sub-Metropolis-01</p>
                        </div>
                        <p>Help today because tomorrow you may be the one </p>
                        <a href="#" class="default-btn">Read More</a>
                    </div>
                </div><!-- Event-2 -->
                <div class="events-item">
                    <div class="event-thumb">
                        <img src="{{ asset('frontend/image/pastevent/climateJustice.png') }}" alt="events">
                    </div>
                    <div class="event-details">
                        <h3>Climate justice, Gender And SRHR </h3>
                        <div class="event-info">
                            <p><i class="ti-calendar"></i>Oct 28, 2023</p>
                            <p><i class="ti-location-pin"></i>Dhangadhi Sub-Metropolis-01</p>
                        </div>
                        <p>Help today because tomorrow you may be the one who needs more helping!</p>
                        <a href="#" class="default-btn">Read More</a>
                    </div>
                </div><!-- Event-3 -->
            </div>
        </div>
    </section><!-- Events Section -->

    <section class="testimonial-section bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>What People Say</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
                <div class="testimonial-item">
                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                        Sudurpashchim Province Nepal, the abused and the helpless.</p>
                    <div class="testi-footer">
                        <img src="{{ asset('frontend/img/team-1.jpg') }}" alt="profile">
                        <h4>faya nepal <span>Marketer</span></h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                        Sudurpashchim Province Nepal, the abused and the helpless.</p>
                    <div class="testi-footer">
                        <img src="Jonathan Smith" alt="profile">
                        <h4>Angelina Rose <span>Designer</span></h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                        Sudurpashchim Province Nepal, the abused and the helpless.</p>
                    <div class="testi-footer">
                        <img src="Jonathan Smith" alt="profile">
                        <h4>Taylor Swift <span>Developer</span></h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                        Sudurpashchim Province Nepal, the abused and the helpless.</p>
                    <div class="testi-footer">
                        <img src="Jonathan Smith" alt="profile">
                        <h4>Michel Brown <span>Programer</span></h4>
                    </div>
                </div>
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
                        <div class="col-md-4 padding-15">
                            <div class="blog-post">
                                <img src="{{ asset('frontend/img/home-blog-1.jpg') }}" alt="blog post">
                                <div class="blog-content">
                                    <span class="date"><i class="fa fa-clock-o"></i> January 01.2024</span>
                                    <h3><a href="#">The History of Donation Told</a></h3>
                                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization
                                        based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                                    <a href="#" class="post-meta">Read More</a>
                                </div>
                            </div>
                        </div><!-- Post 1 -->
                        <div class="col-md-4 padding-15">
                            <div class="blog-post">
                                <img src="{{ asset('frontend/img/home-blog-2.jpg') }}" alt="blog post">
                                <div class="blog-content">
                                    <span class="date"><i class="fa fa-clock-o"></i> January 01.2024</span>
                                    <h3><a href="#">Help the Comunity</a></h3>
                                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization
                                        based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                                    <a href="#" class="post-meta">Read More</a>
                                </div>
                            </div>
                        </div><!-- Post 2 -->
                        <div class="col-md-4 padding-15">
                            <div class="blog-post">
                                <img src="{{ asset('frontend/img/home-blog-3.jpg') }}" alt="blog post">
                                <div class="blog-content">
                                    <span class="date"><i class="fa fa-clock-o"></i> January 01.2024</span>
                                    <h3><a href="#">ngo Ever Rule the World?</a></h3>
                                    <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization
                                        based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                                    <a href="#" class="post-meta">Read More</a>
                                </div>
                            </div>
                        </div><!-- Post 3 -->
                    </div>
                </div><!-- Blog Posts -->
            </div>
        </div>
    </section><!-- Blog Section -->

    <section class="widget-section padding">
        <div class="container">
            <div class="widget-wrap row">
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <img src="{{ asset('frontend/image/fayalogo.png') }}" alt="logo"
                            class="img-fluid faya-logo-main-footer">
                        <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                            Sudurpashchim Province Nepal</p>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Recent Campaigns</h3>
                        <ul class="widget-link">
                            <li><a href="#">Leading Capacity Strengthening Support Programs. <span></span></a>
                            </li>
                            <li><a href="#">Enhancing Cholera Control In Nepal.<span></span></a></li>
                            <li><a href="#">Improving Health Seeking Behavior of Mothers and
                                    Children<span></span></a></li>
                            <li><a href="#"><span></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Faya Nepal Location</h3>
                        <ul class="address">
                            <li><i class="ti-email"></i> fayanepal@hotmail.com</li>
                            <li><i class="ti-mobile"></i> 091- 524329 / 522874</li>
                            <li><i class="ti-world"></i> www.fayanepal.org</li>
                            <li><i class="ti-location-pin"></i> Dhangadhi Sub-Metropolis-01, FAYA Marg, Kailali
                                Sudurpashchim Province, Nepal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./Widget Section -->



@endsection
