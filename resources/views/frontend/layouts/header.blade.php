<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="BG infotechs">
    @php
    $companyProfile = Modules\Setting\Entities\CompanyProfile::select('company_name','favicon')->first();
 @endphp
    {{-- <title>FAYA Nepal || The Forum for Awareness and Youth Activity</title> --}}
    <title>{{ $companyProfile->company_name }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/images/settings/'.$companyProfile->favicon) }}">

    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <!-- Elegant Font Icons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-font-icons.css') }}">
    <!-- Elegant Line Icons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-line-icons.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox/venobox.css') }}">
    <!-- OWL-Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
    <!-- Css Animation CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/css-animation.min.css') }}">
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/nivo-slider.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>