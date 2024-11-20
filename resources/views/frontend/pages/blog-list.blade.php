@extends('frontend.layouts.master')
@section('content')
<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Blog Grid</h2>
            <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->

<section class="blog-section bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 xs-padding">
                <div class="blog-items grid-list row">
                    @foreach ($data['blogs'] as $blog)
                    <div class="col-md-4 padding-15">
                        <div class="blog-post">
                            <img src="{{ asset('upload/images/blogs/'.$blog->image)}}" alt="blog post">
                            <div class="blog-content">
                                <span class="date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}</span>
                                <h3><a href="{{ route('blog.detail',$blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{!! $blog->description !!} </p>
                                <a href="{{ route('blog.detail',$blog->slug) }}" class="post-meta">Read More</a>
                            </div>
                        </div>
                    </div><!-- Post 1 -->
                    @endforeach
                </div>
                
            </div><!-- Blog Posts -->
        </div>
    </div>
</section><!-- /Blog Section -->

@endsection
