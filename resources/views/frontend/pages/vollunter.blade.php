@extends('frontend.layouts.master')
@section('content')

        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>Volluntering</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Volluntering</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->
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
                            <a href="{{ route('become.volunteer') }}" class="default-btn">Become a Volunteer</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Team Section -->
        @endsection