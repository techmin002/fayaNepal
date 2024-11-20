@extends('frontend.layouts.master')
@section('content')
<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Image Gallery</h2>
            <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->

<section class="gallery-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="row">
            <ul class="gallery-filter align-center mb-30">
                <li class="active" data-filter="*">All</li>
                @foreach ($data['categories'] as $cat)
                <li data-filter=".{{ $cat->id }}">{{ $cat->title }}</li>
                @endforeach
            </ul><!-- /.gallery filter -->
        </div>
        <div class="gallery-items row">
            @foreach ($data['galleries'] as $gallery)
            <div class="col-lg-4 col-sm-6 single-item {{ $gallery->gallerycategory_id }}">
                <div class="gallery-wrap">
                    <img src="{{ asset($gallery->image) }}" alt="gallery">
                    <div class="hover">
                        <a class="img-popup" data-gall="galleryimg" href="{{ asset($gallery->image) }}"><i class="ti-image"></i></a> 
                    </div>
                </div>
            </div><!-- /Item-6 -->
            @endforeach
        </div>
    </div>
</section><!-- /Gallery Section -->
@endsection
