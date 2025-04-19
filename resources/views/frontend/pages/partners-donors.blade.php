@extends('frontend.layouts.master')
@section('content')
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>partners</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">partners</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->

 @include('partner::partners.donorpartner', [
    'partners' => \Modules\Partner\Entities\Partner::with('donors')->get()
])
@endsection
