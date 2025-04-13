@extends('frontend.layouts.master')
@section('content')
<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>Volluntering</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Volluntering</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->
@include('frontend.pages.comman_vollunter')
 @endsection