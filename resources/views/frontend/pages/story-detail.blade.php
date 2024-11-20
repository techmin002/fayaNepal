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
                    <h2>{{ $data['blog']->title }}</h2>
                   <!-- Meta Info -->
                    <p>
                        {!! $data['blog']->description !!}
                 
                    <div class="share-wrap">
                        <h4>Share This Story</h4>
                        <ul class="share-icon">
                            <div class="sharethis-inline-share-buttons"></div>
                        </ul>
                        
                    </div><!-- Share Wrap -->
                    
                    {{-- <div class="comments-wrapper">
                        <h4>There are 4 comments</h4>
                        <ul id="comments-list" class="comments-list">
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"> <img src="{{ asset('frontend/img/comment-1.jpg')}}" alt="comment"> </div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                            <span>hace 20 minutos</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                        </div>
                                    </div>
                                </div>
                                <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list">
                                    <li>
                                        <!-- Avatar -->
                                        <div class="comment-avatar"> <img src="{{ asset('frontend/img/comment-2.jpg')}}" alt="comment"> </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                                <span>hace 10 minutos</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- Avatar -->
                                        <div class="comment-avatar"> <img src="{{ asset('frontend/img/comment-3.jpg')}}" alt="comment"> </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                                <span>hace 10 minutos</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"> <img src="{{ asset('frontend/img/comment-4.jpg')}}" alt="comment"> </div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                            <span>hace 10 minutos</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="comment-form">
                            <h4>Leave a reply</h4>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="https://html.BG infotechs.net/dl/charitify/contact.php" method="post" id="ajax_form" class="form-horizontal">
                                <div class="form-group colum-row row">
                                    <div class="col-sm-4">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="website" id="website" name="website" class="form-control" placeholder="Website" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button id="submit" class="default-btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages" class="alert" role="alert"></div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div><!-- Blog Posts -->
            <div class="col-lg-3 sm-padding">
                <div class="sidebar-wrap">
                    {{-- <div class="sidebar-widget mb-50">
                        <h4>Search Posts</h4>
                        <form action="#" class="search-form">
                            <input type="text" class="form-control" placeholder="Type here">
                            <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-widget mb-50">
                        <h4>Categories</h4>
                        <ul class="cat-list">
                            <li><a href="#">Wed design</a><span>(2)</span></li>
                            <li><a href="#">Graphics design</a><span>(4)</span></li>
                            <li><a href="#">Wordpress</a><span>(7)</span></li>
                            <li><a href="#">Joomla</a><span>(5)</span></li>
                            <li><a href="#">Marketing</a><span>(3)</span></li>
                            <li><a href="#">Music</a><span>(2)</span></li>
                        </ul>
                    </div><!-- Categories -->  --}}
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
                    {{-- <div class="sidebar-widget mb-50">
                        <h4>Tags</h4>
                        <ul class="tags">
                            <li><a href="#">Audio</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Magazine</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Post</a></li>
                            <li><a href="#">Quotes</a></li>
                        </ul>
                    </div><!-- Tag --> --}}
                </div><!-- /Sidebar Wrapper -->
            </div>
        </div>
    </div>
</section><!-- /Blog Section -->
@endsection
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=673045da465baa001278e754&product=inline-share-buttons&source=platform" async="async"></script>