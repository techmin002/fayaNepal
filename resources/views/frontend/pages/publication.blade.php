@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


   <style>
      <style>
        /* Card Styling */
        .chart-card {
          /* border: 2px solid  #0dcaf0; */
            background-color: #f8f9fa;
            border-radius: 10px;
            text-align: center;
            box-shadow: 3px 1px 5px #0dcaf0;

        }
        .chart-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: auto;
        }
        .name {
            font-weight: 600;
            color: #0dcaf0;
        }
        .title {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .connector {
            position: relative;
            width: 2px;
            height: 40px;
            background-color: #0dcaf0;
            margin: auto;
        }
        .line {
            width: 100%;
            height: 2px;
            background-color: #0dcaf0;
            position: absolute;
            top: 50%;
            left: 0;
        }
        .horizontal-line-container {
            position: relative;
            height: 4px;
            margin: 0 auto;
        }
        .child-connector {
            position: relative;
            width: 2px;
            height: 20px;
            background-color: #0dcaf0;
            margin: 0 auto;
        }
        .child-connector-point{
          position: relative;
    width: 12px;
    height: 12px;
    background-color: #0dcaf0;
    margin: 0 auto;
        }
    </style>
   </style>
<script>
<link rel="stylesheet" href="path/to/fontawesome/css/all.min.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">

</script>
@section('content')
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>Publication</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Publication</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="box-wrapper">
        @foreach ($publications as $publication)
            
        
        <figure class="shape-box shape-box_half">
            <img src="{{ asset('upload/images/publications/'.$publication->image) }}" alt="">
            <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
            <figcaption>
                <div class="show-cont">
                    <div class='row'>
                    <div class='publication-div'>
                    <ul class='publication-ul'>
                      <li class='publication-li' data-category="publications"> <span class='card-no'>{{ $loop->iteration }}</span>  <span class='card-category'>Publications </span> </li>
                    </ul>
                    </div>
                </div>
                    <h4 class="card-main-title">{{ $publication->title }}</h4>
                </div>
                <p class="card-content">{!! $publication->description !!}</p>
                  <div class="btn-class-name">
                  <a href="{{ asset('upload/images/publications/'.$publication->file) }}" type="button" class="btn btn-primary btn-class-name-btn" download=""><i class="fa-solid fa-download"></i> Download</a>
                  </div>
            

            </figcaption>
            <span class="after"></span>
        </figure>
        @endforeach
        
    </div>
         <div class='main-design-btn'>
          
         </div>  
        @endsection
