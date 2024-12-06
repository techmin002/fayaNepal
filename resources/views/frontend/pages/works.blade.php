@extends('frontend.layouts.master')
<style>
    .main-div-tabs {
        background: #cce9d9;
        position: relative;
    }

    .main-top-tab {
        display: flex;
        background: #01923f;
        border: 1px solid #cccccc;
        border-radius: 8px;
        width: 100%;
        margin-top: 0px;
        position: sticky;
        top: 82 px;
        z-index: 9898888;

    }

    .main-top-tab p {
        margin-bottom: 0px !important;
    }

    .main-top-tab a {
        background-color: #004aad;
        font-weight: bold;
        color: #ffff;
        border: 1px solid #cccccc;
        border-radius: 8px;
        padding: 10px;
        margin: 5px 0 5px 5px;
        height: 30px;
        cursor: pointer;
        display: inline-flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        transition: transform 0.2s, opacity 0.2s ease;
        padding: 20px
    }

    .main-top-tab a:hover {
        background-color: #01923f;
        color: #ffff;
    }

    .main-top-tab a:active {
        background-color: #01923f;
        color: #ffff;
    }
</style>

@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Our Work</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">our work</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <section class="blog-section bg-grey padding">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 sm-padding">
                  <div class="blog-items single-post row">
                      <img src="{{ asset('upload/images/category/'.$data['category']->image)}}" alt="sector post">
                      <h2>{{ $data['category']->title }}</h2>
                     <!-- Meta Info -->
                      <p>
                          {!! $data['category']->description !!}
                   
                      <div class="share-wrap">
                          <h4>Share This Program</h4>
                          <ul class="share-icon">
                              <div class="sharethis-inline-share-buttons"></div>
                          </ul>
                          
                      </div><!-- Share Wrap -->
                      
                    
                  </div>
              </div><!-- Blog Posts -->
             
          </div>
          <div class="row">
            <div class="col-md-12">
              <h1>Related Programs</h1>
              <hr>
              <section class="causes-section bg-grey bd-bottom padding">
                <div class="container">
                    <div class="causes-wrap row">
                        @foreach ($data['programs'] as $program)
                            <div class="col-md-4 xs-padding mt-3">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                      @if (is_int($program->icon) && $program->icon >= 15)
                                      @php
                                          $progress = 'style=width:' . $program->icon . '%';
                                         $per =  $program->icon;
                                      @endphp
                                  @else
                                      @php
                                          $progress = 'style=width:100%';
                                          $per =  100;
                                      @endphp
                                  @endif

                                        <img src="{{ asset('upload/images/services/' . $program->image) }}" alt="causes">
                                        <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" {{ $progress }} aria-valuenow="{{ $per }}"
                                                aria-valuemin="0" aria-valuemax="{{ $per }}"><span
                                                    class="wow cssanimation fadeInLeft">{{ $per }}%</span></div>
                                        </div>
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $program->title }}</h3>
                                        <p>{!! $program->shortdescription !!}</p>
                                        <a href="{{ route('program.detail',$program->slug) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div><!-- /Program-1 -->
                        @endforeach
                    </div>
                </div>
            </section><!-- /Program Section -->
            </div>
          </div>
      </div>
  </section><!-- /Blog Section -->

@endsection
