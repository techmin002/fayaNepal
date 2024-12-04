<style>
  
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: #fff;
    }
    .navbar-nav .nav-link {
      color: #fff;
      font-weight: 500;
    }
  
    .dropdown-menu {
      display: none;
      background-color: #fff;
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .dropdown:hover > .dropdown-menu {
      display: block;
    }
    .dropdown-menu .dropdown-item {
      padding: 10px 20px;
    }
    .dropdown-menu .dropdown-item:hover {
      color: #fff;
    }
    /* Nested dropdowns */
    .dropdown-menu .dropdown-menu {
      display: none;
      position: absolute;
      left: 100%;
      top: 0;
      margin-top: -1px;
      border-radius: 8px;
    }
    .dropdown-menu > .dropdown:hover > .dropdown-menu {
      display: block;
    }
  </style>
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
                        $programCategory = Modules\Service\Entities\ProgramCategory::select('slug','title')->where('status','on')->get();
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
                <div class="col-sm-3">
                    <div class="site-branding">
                        <a href="{{ url('/') }}"><img src="{{ asset('upload/images/settings/'.$companyProfile->logo) }}" alt="Brand"
                                class="img-fluid faya-logo-main"></a>
                    </div>
                </div>
                <div class="col-sm-9 text-right">
                    {{-- <ul id="mainmenu" class="nav navbar-nav nav-menu">
                        <li class="active"> <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><a href="#">Our Story</a>
                            <ul>
                                    <li><a href="{{ route('frontend.about') }}">FAYA History</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Coverage</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Executive Board</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Leadership</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Organogram</a></li>
                                    <li><a href="{{ route('frontend.partners') }}">Donors/ Partners</a></li>
                                  
                            </ul>
                        </li>
                        <li><a href="#">Our Work</a>
                            <ul>
                                    @foreach($programCategory as $cat)
                                    <li><a href="{{ route('frontend.gallery') }}">{{ $cat->title }}</a></li>
                                   @endforeach
                                    <li><a href="{{ route('frontend.gallery') }}">Projects</a></li>
                                  
                            </ul>
                        </li>
                        <li><a href="#">Resources</a>
                            <ul>
                                    <li><a href="{{ route('frontend.gallery') }}">Reports</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Publications</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Stories</a></li>

                                  
                            </ul>
                        </li>
                        <li><a href="#">Get Involved</a>
                            <ul>
                                    <li><a href="{{ route('frontend.gallery') }}">Vacancy</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Procurement</a></li>
                                    <li><a href="{{ route('frontend.vollunter') }}">Volluntering</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Notice</a></li>
   
                            </ul>
                        </li>
                        <li><a href="{{ route('frontend.about') }}">About</a></li>
                        <li><a href="{{ route('frontend.fn-Programs') }}">Program</a></li>
                        <li><a href="{{ route('frontend.events') }}">Event</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('frontend.about') }}">Volunteers</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('frontend.blogs') }}">Blog</a>
                        </li>
                        <li> <a href="{{ route('frontend.contact') }}">Contact</a></li>
                    </ul> --}}
                  
                            <ul class="nav navbar-nav ms-auto" id="mainmenu">
                              <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                              </li>
                              <!-- Services Dropdown -->
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('frontend.about') }}" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Our Story
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                  <!-- Web Development Dropdown -->
                                  <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="{{ route('frontend.about') }}">FAYA History</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('frontend.coverage') }}">Coverage</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Executive Board</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Leadership</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Organogram</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.partnersdonors') }}">Donors/Partners</a></li>
                                    </ul>
                                  </li>
                                  
                                </ul>
                              </li>
                              <!-- About Dropdown -->
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Our Work
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                  <!-- Web Development Dropdown -->
                                  @foreach($programCategory as $cat)
                                  <li><a class="dropdown-item" href="{{ route('frontend.works',$cat->slug) }}">{{ $cat->title }}</a></li>
                                 @endforeach
                                  <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#">Projects</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('frontend.ourprograms') }}">Current</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.events') }}">Phased Out</a></li>
                                    
                                    </ul>
                                  </li>
                                  
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Resources
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                  <!-- Web Development Dropdown -->
                                  <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#">Reports</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Annual Reports</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Project Reports</a></li>
                                     </ul>
                                  </li>
                                  <li><a class="dropdown-item" href="#">Publications</a></li>
                                  <li><a class="dropdown-item" href="{{ route('frontend.storege') }}">Stories</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Get Involved
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                  <!-- Web Development Dropdown -->
                                  <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#">Vacancy</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Procurement</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.vollunter') }}">Volluntering</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.noticeboard') }}">Notice</a></li>
                                    
                                    </ul>
                                  </li>
                                  
                                </ul>
                              </li>
                              <!-- Contact -->
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
                              </li>
                            </ul>
                          
                      </nav>
                    <a href="#" class="default-btn">Donet Now</a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /Header Section -->

<div class="header-height"></div>