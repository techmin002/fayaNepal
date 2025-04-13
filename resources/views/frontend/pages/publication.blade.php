@extends('frontend.layouts.master')
@section('content')


<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Our Publications</h2>
            <p>Discover our latest research, reports, and resources to empower communities</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Publications</li>
            </ol>
        </div>
    </div>
</div>
@include('frontend.pages.comman_publication')
@endsection