@extends('frontend.layouts.master')
@section('content')
<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Program Detail's </h2>
            <p>{{ $data['blog']->title }}</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->
<section class="blog-section bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 sm-padding">
                <div class="blog-items single-post row">
                    <img src="{{ asset('upload/images/services/'.$data['blog']->image)}}" alt="blog post">
                    <h2>{{ $data['blog']->title }}</h2>
                   <!-- Meta Info -->
                    <p>
                        {!! $data['blog']->description !!}
                 
                    <div class="share-wrap">
                        <h4>Share This Program</h4>
                        <ul class="share-icon">
                            <div class="sharethis-inline-share-buttons"></div>
                        </ul>
                        
                    </div><!-- Share Wrap -->
                    
                  
                </div>
            </div><!-- Blog Posts -->
            <div class="col-lg-3 sm-padding">
                <div class="sidebar-wrap">
                    
                    <div class="sidebar-widget mb-50">
                        <h4>Recent Program</h4>
                        <ul class="recent-posts">
                            @foreach ($data['blogs'] as $item)
                            <li>
                                <img src="{{ asset('upload/images/services/'.$item->image)}}" alt="blog post">
                                <div>
                                    <h4><a href="{{ route('program.detail',$item->slug) }}">{{ $item->title }}</a></h4>
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