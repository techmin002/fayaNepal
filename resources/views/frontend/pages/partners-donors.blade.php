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
        <div class="sponsor-section bd-bottom">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Our Partners</h2>
                    <span class="heading-border"></span>
                    <p>"FAYA Nepal collaborates with various grassroots organizations and development allies to enhance its impact and drive sustainable social change. These strategic partnerships empower FAYA to amplify its efforts in promoting equality, human rights, and community development."</p>
                       
                </div>
                
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row main-container-down align-items-center h-100">
              <div class="container-unique rounded">
                <div class="unique-slider">
                  <div class="unique-logos">
                    @foreach ($data['pastpartners'] as $past)
                    <img src="{{ asset('upload/images/partners/'.$past->logo)}}" alt="Brand 1" class="unique-logo">
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
           {{-- <div class="sponsor-section bd-bottom">
            <div class="container">
                <div class="section-heading text-center mb-40">
                    <h2>Our Partners</h2>
                    <span class="heading-border"></span>
                    <p>"FAYA Nepal collaborates with various grassroots organizations and development allies to enhance its impact and drive sustainable social change. These strategic partnerships empower FAYA to amplify its efforts in promoting equality, human rights, and community development."</p>
                </div><!-- /Section Heading -->
                <ul id="sponsor-carousel" class="sponsor-items owl-carousel owl-carousel-partneer">
                    @foreach ($data['currentpartners'] as $current)
                    <li class="sponsor-item">
                        <img src="{{ asset('upload/images/partners/'.$current->logo)}}" alt="sponsor-image">
                    </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        @endsection