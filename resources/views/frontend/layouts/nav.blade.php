<div class="site-preloader-wrap">
    <div class="spinner"></div>
</div><!-- Preloader -->

<header id="header" class="header-section">
    <div class="top-header">
        
        <div class="container-fluid">
            <div class="top-content-wrap row">
                <div class="col-sm-8">
                    
                    <ul class="left-info">
                        @php
                        $companyProfile = Modules\Setting\Entities\CompanyProfile::first();
                     @endphp 
                     <li><strong class="text-white">Together For Prosperity</strong></li>
                        <li><a href="#"><i class="ti-email"></i>{{ $companyProfile->company_email }}</a></li>
                        <li><a href="#"><i class="ti-mobile"></i>{{ $companyProfile->company_phone }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 d-none d-md-block">
                    <ul class="right-info">
                        <li><a href="{{ $companyProfile->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $companyProfile->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $companyProfile->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $companyProfile->youtube }}"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{ $companyProfile->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="bottom-content-wrap row">
                <div class="col-sm-4">
                    <div class="site-branding">
                        <a href="{{ url('/') }}"><img src="{{ asset('upload/images/settings/'.$companyProfile->logo) }}" alt="Brand"
                                class="img-fluid faya-logo-main"></a>
                    </div>
                </div>
                <div class="col-sm-8 text-right">
                    <ul id="mainmenu" class="nav navbar-nav nav-menu">
                        <li class="active"> <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><a href="{{ route('frontend.about') }}">About</a></li>
                        <li><a href="{{ route('frontend.ourprograms') }}">Program</a></li>
                        <li><a href="{{ route('frontend.events') }}">Event</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('frontend.about') }}">Volunteers</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="{{ route('frontend.blogs') }}">Blog</a> --}}
                        </li>
                        <li> <a href="{{ route('frontend.contact') }}">Contact</a></li>
                    </ul>
                    <a href="#" class="default-btn">Donet Now</a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /Header Section -->

<div class="header-height"></div>