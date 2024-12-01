@extends('frontend.layouts.master')
@section('content')


        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>storages</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">storages Board  </li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->
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
                        @foreach ($data['stories'] as $story)
                            
                        
                        <div class="col-md-4 padding-15">
                            <div class="blog-post">
                                <img src="{{ asset('upload/images/advertisements/'.$story->image) }}" alt="blog post">
                                <div class="blog-content">
                                    <span class="date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($story->date)->format('d-M-Y') }}</span>
                                    <h3><a href="#">{{ $story->title }}</a></h3>
                                    <p>{!! $story->description !!}</p>
                                    <a href="#" class="post-meta">Read More</a>
                                </div>
                            </div>
                        </div><!-- Post 1 -->
                        @endforeach
                    </div>
                </div><!-- Blog Posts -->
            </div>
        </div>
    </section><!-- Blog Section -->
   
        @endsection