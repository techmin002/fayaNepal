@extends('frontend.layouts.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Become Volluntering</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Become Volluntering</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <!-- body -->
    <section class="team-section bg-grey bd-bottom circle shape padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Become Volluntering</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div class="team-wrapper row">
                <div class="col-lg-12 sm-padding ">
                    <div class="team-wrap row ">
                        <a class="badge badge-danger">
                            <h2 style="color:white">
                                Note: To become a volunteer, download the sample form, fill out all the details, and upload
                                the completed form below.
                            </h2>
                        </a>
                        <hr>
                    </div>
                    <div class="team-wrap text-center">
                        <a class="default-btn"
                            href="{{ asset('upload/images/volunteer-form/Vollunteer Application  form.pdf') }}"
                            download>Download Sample</a>

                    </div>
                </div>
                <div class="col-lg-12 sm-padding mt-5">
                    <div class="team-content histry-mission-div">

                        <div class="card">
                            <div class="card-header">
                                <h3>Upload Your Completed Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Volunteer Form</label>
                                        <input type="file" class="form-control" name="file" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Team Section -->
@endsection
