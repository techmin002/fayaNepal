@extends('frontend.layouts.master')
@section('content')
<style>
  @media only screen and (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        min-width: 600px; /* Adjust as needed */
    }

    table td, table th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px; /* Adjust as needed */
    }
}
    </style>


    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Phased Out Program</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="causes-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="causes-wrap row">
                <div class="col-md-12">
                    <div class="section-heading text-center mb-40">
                        <h2>Phased Out Programs</h2>
                        <span class="heading-border"></span>
                    </div><!-- /Section Heading -->
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Project/ Program Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Sector</th>
                                <th>Project Location</th>
                                <th>Partners/ Donor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['programs'] as $program)
                                <tr>
                                    <td data-label="S.N">{{ $loop->iteration }}</td>
                                    <td data-label="Project/ Program Name">{{ $program->title }}</td>
                                    <td data-label="Start Date">{{ $program->date }}</td>
                                    <td data-label="End Date">{{ $program->end_date ?? 'N/A' }}</td>
                                    <td data-label="Sector">{{ $program->category['title'] ?? 'N/A' }}</td>
                                    <td data-label="Project Location">{{ $program->location ?? 'N/A' }}</td>
                                    <td data-label="Partners/ Donor">
                                        @php
                                            $ids = json_decode($program->partner_id);
                                            $partners = Modules\Partner\Entities\Partner::whereIn('id', $ids)->pluck('title')->toArray();
                                        @endphp
                                        {{ implode(', ', $partners) }}
                                    </td>
                                    <td data-label="Action">
                                        <a href="{{ route('program.detail', $program->slug) }}">View Detail's</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section><!-- /Program Section -->

    <section class="campaigns-section bd-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 xs-padding">
                    <div class="campaigns-wrap">
                        <h4>Featured Campaigns</h4>
                        <h2>Featured project to built a School.</h2>
                        <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                            Sudurpashchim Province Nepal, the abused and the helpless.</p>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"><span class="wow cssanimation fadeInLeft">35%</span>
                            </div>
                        </div> --}}
                        {{-- <div class="donation-box">
                            <h3><i class="ti-bar-chart"></i>Goal: $450000</h3>
                            <h3><i class="ti-thumb-up"></i>Raised: $55000</h3>
                        </div> --}}
                        <a href="{{ url('donate') }}" class="default-btn">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="video-wrap">
                        <img src="{{ asset('frontend/img/video.jpg') }}" alt="video">
                        <div class="play">
                            <a class="img-popup" data-autoplay="true" data-vbtype="video"
                                href="https://www.youtube.com/watch?v=_IlLwfC2dNc"><i class="ti-control-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Featured Campaigns Section -->

   @include('frontend.pages.commann_feedback')
   @include('frontend.pages.comman_story')
@endsection
