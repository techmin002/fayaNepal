@extends('frontend.layouts.master')
@section('content')
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>About Us</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        
        <section class="about-section bg-grey bd-bottom padding">
            {{-- <div class="container">
                <h2  style="text-align: center; color: #01923f;">"It is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal"</h2>
            </div>
            <br>
            <div class="container">
                <div class="row about-wrap">
                    <div class="col-md-6 xs-padding">
                        <div class="about-image">
                            <img src="{{ asset('frontend/image/fayanpl.jpg')}}" alt="about image">
                        </div>
                    </div>
                    <div class="col-md-6 xs-padding">
                        <div class="about-content">
                            <p> Founded in 1995, The Forum for Awareness and Youth Activity (FAYA) Nepal stands as a transformative force dedicated to driving positive change in society. This organization, officially recognized as a non-governmental organization (NGO) by the District Administration Office Kailali and affiliated with the Social Welfare Council, initially focused on empowering young people and their interconnected communities to effectively address the pressing challenges facing society. </p>
                            <P>FAYA operating under the guiding principles of a Human Rights-Based Approach (HRBA) since 2004, FAYA has played a pivotal role in various human rights networks and alliances at the district and regional levels. Its activities have extended into critical areas such as advocating for wage parity, ensuring secure rehabilitation for freed Kamiya (formerly bonded laborers), and amplifying the Women's Rights Forum. These initiatives underscore FAYA's commitment to promoting equality, social justice, and gender empowerment.</P>
                        </div>
                    </div>
                    <div class="about-content"> 
                        <P>One of FAYA's notable strengths lies in its ability to form strategic partnerships with grassroots organizations and development allies. These collaborations reflect the organization's forward-thinking vision and its understanding of the importance of synergy in fostering sustainable change. By working hand in hand with local partners and allies, FAYA has been able to amplify its impact and reach, making significant strides in its mission to create a more equitable and just society. Through its proactive approach and unwavering commitment, FAYA continues to be a driving force in the realm of social change in Nepal.</P>
                        <P>By addressing issues at their roots and championing the rights of marginalized communities, FAYA exemplifies the power of grassroots initiatives in instigating constructive transformation and paving the way for a brighter future.</P>
                    </div>
                </div>
            </div> --}}
            {!! $data['profile']->introduction !!}
        </section><!-- /About Section -->

        <section class="about-section bd-bottom shape circle padding">
            <div class="container">
                <div class="row">
                   <div class="col-md-4 xs-padding">
                        <div class="profile-wrap">
                            <img class="profile" src="{{ asset('frontend/image/profile.png')}}" alt="profile">
                            <h3>Goma Achrya <span>Chairman of Faya nepal.</span></h3>
                            <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                            <img src="{{ asset('frontend/img/sign.png')}}" alt="sign">
                        </div>
                    </div>
                    <div class="col-md-8 xs-padding">
                        <div class="about-wrap row">
                            <div class="col-md-6 xs-padding histry-mission-div">
                                <img src="{{ asset('frontend/image/history.png')}}" alt="about-thumb">
                                <h3>Our History</h3>
                                <p>{!! $data['profile']->vision !!}</p>
                                <a href="#" class="default-btn">Read More</a>
                            </div>
                            <div class="col-md-6 xs-padding histry-mission-div">
                                <img src="{{ asset('frontend/image/mission.png')}}" alt="about-thumb">
                                <h3>Our Mission</h3>
                                <p>{!! $data['profile']->mission !!}</p>
                                <a href="#" class="default-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Program Section -->
        
        <section class="team-section bg-grey bd-bottom circle shape padding">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Meet Our Team</h2>
                    <span class="heading-border"></span>
                    <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
                </div><!-- /Section Heading -->
                <div class="team-wrapper row">
                    <div class="col-lg-6 sm-padding">
                        <div class="team-wrap row">
                            @foreach ($data['teams'] as $team)
                                
                            
                            <div class="col-md-6">
                                <div class="team-details">
                                   <img src="{{ asset('upload/images/teams/'.$team->image)}}" alt="team">
                                    <div class="hover">
                                        <h3>{{ $team->name }} <span>{{ $team->designation }}</span></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 sm-padding">
                        <div class="team-content histry-mission-div">
                            <h2>Become a Volunteer?</h2>
                            <h3>Join your hand with us for a better life and beautiful future.</h3>
                            <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                            <ul class="check-list">
                                <li><i class="fa fa-check"></i>We are friendly to each other.</li>
                                <li><i class="fa fa-check"></i>If you join with us,We will give you free training.</li>
                                <li><i class="fa fa-check"></i>Its an opportunity to help poor children.</li>
                                <li><i class="fa fa-check"></i>No goal requirements.</li>
                                <li><i class="fa fa-check"></i>Joining is tottaly free. We dont need any money from you.</li>
                            </ul>
                            <a href="#" class="default-btn">Join With Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Team Section -->
        
        <section id="counter" class="counter-section">
		    <div class="container">
                <ul class="row counters">
                    <li class="col-md-3 col-sm-6 sm-padding">
                        <div class="counter-content">
                            <i class="ti-money"></i>
                            <h3 class="counter">85389</h3>
                            <h4 class="text-white">Portfolio</h4>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 sm-padding">
                        <div class="counter-content">
                            <i class="ti-face-smile"></i>
                            <h3 class="counter">10693</h3>
                            <h4 class="text-white">Beneficiary Direct</h4>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 sm-padding">
                        <div class="counter-content">
                            <i class="ti-user"></i>
                            <h3 class="counter">50177</h3>
                            <h4 class="text-white">Beneficiary InDirect</h4>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 sm-padding">
                        <div class="counter-content">
                            <i class="ti-comments"></i>
                            <h3 class="counter">669</h3>
                            <h4 class="text-white">Project Portfolio</h4>
                        </div>
                    </li>
                </ul>
		    </div>
		</section><!-- Counter Section -->
              
        {{-- <div class="sponsor-section bd-bottom">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Our Partners</h2>
                    <span class="heading-border"></span>
                    <p>"FAYA Nepal collaborates with various grassroots organizations and development allies to enhance its impact and drive sustainable social change. These strategic partnerships empower FAYA to amplify its efforts in promoting equality, human rights, and community development."</p>
                </div><!-- /Section Heading -->
                <ul id="sponsor-carousel" class="sponsor-items owl-carousel owl-carousel-partneer">
                    @foreach ($data['currentpartners'] as $current)
                    <li class="sponsor-item">
                        <img src="{{ asset('upload/images/partners/'.$current->logo)}}" alt="sponsor-image">
                    </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        <!-- ./Sponsor Section -->
             
        <!--past Sponsor Section -->
        <div class="sponsor-section bd-bottom">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Our Partners</h2>
                    <span class="heading-border"></span>
                    <p>"We extend our heartfelt thanks to all our past partners for their invaluable support and collaboration. Their contributions have been instrumental in advancing FAYA Nepal's mission, leaving a lasting impact on social justice, human rights, and community empowerment across Nepal."</p> 
                       
                </div>
                
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row main-container-down align-items-center h-100">
              <div class="container-unique rounded">
                <div class="unique-slider">
                  <div class="unique-logos">
                    @foreach ($data['pastpartners'] as $past)
                    <img src="{{ asset('upload/images/partners/'.$past->logo)}}" alt="Brand 1" class="unique-logo">
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection