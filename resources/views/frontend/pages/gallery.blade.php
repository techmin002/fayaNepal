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
            <div class="category-slider-container">
                <ul class="gallery-filter align-center mb-30">
                    <li class="active" data-filter="*">All</li>
                    @foreach ($data['categories'] as $cat)
                    <li data-filter=".{{ $cat->id }}">{{ $cat->title }}</li>
                    @endforeach
                </ul>
            </div><!-- /.gallery filter -->
        </div>
        <div class="gallery-items row">
            @foreach ($data['galleries'] as $gallery)
            <div class="col-lg-4 col-sm-6 single-item {{ $gallery->gallerycategory_id }}">
                <div class="gallery-wrap">
                    <div class="gallery-image-container">
                        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}">
                    </div>
                    <div class="gallery-title text-center">
                        <h4>{{ $gallery->title }}</h4>
                    </div>
                    <div class="hover">
                        <a class="img-popup" data-gall="galleryimg" href="{{ asset($gallery->image) }}"><i class="ti-image"></i></a>
                    </div>
                </div>
            </div><!-- /Item-6 -->
            @endforeach
        </div>
    </div>
</section><!-- /Gallery Section -->

<style>
    /* Gallery image size consistency */
    .gallery-image-container {
        width: 100%;
        height: 250px; /* Fixed height */
        overflow: hidden;
    }

    .gallery-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures images maintain aspect ratio */
        transition: transform 0.3s ease;
    }

    .gallery-wrap:hover .gallery-image-container img {
        transform: scale(1.05);
    }

    .gallery-title {
        padding: 15px 0;
    }

    .gallery-title h4 {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    /* Category slider styles */
    .category-slider-container {
        width: 100%;
        overflow-x: auto;
        padding-bottom: 10px;
    }

    .gallery-filter {
        display: flex;
        flex-wrap: nowrap;
        white-space: nowrap;
        padding: 0;
        margin: 0;
    }

    .gallery-filter li {
        display: inline-block;
        margin: 0 10px;
        padding: 8px 15px;
        background: #f5f5f5;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .gallery-filter li.active {
        background: #4CAF50;
        color: white;
    }

    .gallery-filter li:hover {
        background: #ddd;
    }

    /* Hide scrollbar but keep functionality */
    .category-slider-container::-webkit-scrollbar {
        height: 5px;
    }

    .category-slider-container::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .category-slider-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .category-slider-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<script>
    // Initialize any necessary JavaScript for the gallery
    document.addEventListener('DOMContentLoaded', function() {
        // You can add any gallery filter functionality here if needed
    });
</script>
@endsection