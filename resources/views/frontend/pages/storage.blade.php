@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="pager-header">
    <div class="container">
        <div class="page-content">
            <h2>storages</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">storages Board</li>
            </ol>
        </div>
    </div>
</div><!-- /Page Header -->
{{-- recent story include --}}
@include('frontend.pages.comman_story')
@endsection