@extends('frontend.layouts.master')
@section('content')
<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Story </h2>
            <p>{{ $data['blog']->title }}</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Story</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->
<section class="blog-section bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 sm-padding">
                <div class="blog-items single-post row">
                    <img src="{{ asset('upload/images/advertisements/'.$data['blog']->image)}}" alt="blog post">
                    <div><h2>{{ $data['blog']->title }}</h2> </div><br>
                   <!-- Meta Info -->
                        <div>{!! $data['blog']->description !!}</div>

                    <div class="share-wrap">
                        <h4>Share This Story</h4>
                        <ul class="share-icon">
                            <div class="sharethis-inline-share-buttons"></div>
                        </ul>

                    </div><!-- Share Wrap -->

                </div>
            </div><!-- Blog Posts -->
            <div class="col-lg-3 sm-padding">
                <div class="sidebar-wrap">
                    <div class="sidebar-widget mb-50">
                        <h4>Recent Events</h4>
                        <ul class="recent-posts">
                            @foreach ($data['blogs'] as $item)
                            <li>
                                <img src="{{ asset('upload/images/advertisements/'.$item->image)}}" alt="blog post">
                                <div>
                                    <h4><a href="{{ route('story.detail',$item->id) }}">{{ $item->title }}</a></h4>
                                    <span class="date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- Recent Posts -->
                </div><!-- /Sidebar Wrapper -->
            </div>
        </div>
    </div>
</section><!-- /Blog Section -->
@endsection
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=673045da465baa001278e754&product=inline-share-buttons&source=platform" async="async"></script>