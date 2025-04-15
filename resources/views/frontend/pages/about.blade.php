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
            {!! $data['profile']->introduction !!}
        </section><!-- /About Section -->

<section class="about-section bd-bottom shape circle padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 xs-padding">
                <div class="profile-wrap fixed-box">
                    <img class="profile" src="{{ asset('frontend/image/chairperson.png')}}" alt="profile">
                    <h3>Goma Achrya <span>Chairperson of Faya Nepal</span></h3>
                    <div class="content-preview">
                        <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                        <img src="{{ asset('frontend/img/signature.png')}}" width="50%" alt="sign">
                    </div>
                    <a href="#" class="default-btn read-more" data-target="profile-modal">Full Read</a>
                </div>
            </div>
            <div class="col-md-8 xs-padding">
                <div class="about-wrap row">
                    <div class="col-md-6 xs-padding histry-mission-div fixed-box">
                        <img src="{{ asset('frontend/image/history1.jpeg')}}" alt="about-thumb">
                        <h3>Our History</h3>
                        <div class="content-preview">
                            <p>{!! Str::limit($data['profile']->vision, 200) !!}</p>
                        </div>
                        <a href="#" class="default-btn read-more" data-target="history-modal">Full Read</a>
                    </div>
                    <div class="col-md-6 xs-padding histry-mission-div fixed-box">
                        <img src="{{ asset('frontend/image/mission1.jpeg')}}" alt="about-thumb">
                        <h3>Our Mission</h3>
                        <div class="content-preview">
                            <p>{!! Str::limit($data['profile']->mission, 200) !!}</p>
                        </div>
                        <a href="#" class="default-btn read-more" data-target="mission-modal">Full Read</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Popups -->
<div id="profile-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Goma Achrya - Chairperson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="profile mb-3" src="{{ asset('frontend/image/chairperson.png')}}" alt="profile" style="max-width: 200px;">
                <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
                <img src="{{ asset('frontend/img/signature.png')}}" width="30%" alt="sign">
            </div>
        </div>
    </div>
</div>

<div id="history-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Our History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('frontend/image/history1.jpeg')}}" alt="about-thumb" class="mb-3" style="max-width: 200px;">
                <div class="full-content">
                    {!! $data['profile']->vision !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mission-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Our Mission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('frontend/image/mission1.jpeg')}}" alt="about-thumb" class="mb-3" style="max-width: 200px;">
                <div class="full-content">
                    {!! $data['profile']->mission !!}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Fixed Box Styles */
    .fixed-box {
        height: 450px;
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        background: #fff;
    }

    .fixed-box img {
        max-height: 120px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .fixed-box h3 {
        margin-bottom: 15px;
        color: #333;
    }

    .content-preview {
        flex-grow: 1;
        overflow: hidden;
    }

    .fixed-box .default-btn {
        align-self: flex-start;
        margin-top: 15px;
    }

    /* Modal Styles */
    .modal-content {
        padding: 20px;
    }

    .modal-body img {
        display: block;
        margin: 0 auto 20px;
    }

    @media (max-width: 768px) {
        .fixed-box {
            height: auto;
            min-height: 350px;
        }
    }
</style>

<script>
    $(document).ready(function() {
        // Handle read more clicks
        $('.read-more').click(function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('#' + target).modal('show');
        });
    });
</script>
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

        <!--past Sponsor Section -->
      @include('frontend.pages.donorlogo')

@endsection
