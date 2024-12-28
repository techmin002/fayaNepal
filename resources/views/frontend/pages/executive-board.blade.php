@extends('frontend.layouts.master')
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
        /* Card Styling */
        .chart-card {
            background-color: #f8f9fa !important;
            border-radius: 10px !important;
            text-align: center !important;
            box-shadow: 3px 1px 5px  #da251c !important;

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
            color: #01923f;
        }
        .title {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .connector {
            position: relative;
            width: 2px;
            height: 40px;
            background-color: #01923f;
            margin: auto;
        }
        .line {
            width: 100%;
            height: 2px;
            background-color: #01923f;
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
            background-color: #01923f;
            margin: 0 auto;
        }
        .child-connector-point{
          position: relative;
    width: 12px;
    height: 12px;
    background-color: #01923f;
    margin: 0 auto;
        }
    </style>
    
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    ></script>
  

@section('content')

        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>Managaement</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Managaement</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- body -->

         <div class='container mt-40 mb-40'>
         <div class="section-heading text-center mb-40">
                    <h2>Management</h2>
                    <span class="heading-border"></span>
                    <p>"FAYA Nepal collaborates with various grassroots organizations and development allies to enhance its impact and drive sustainable social change. These strategic partnerships empower FAYA to amplify its efforts in promoting equality, human rights, and community development."</p>
                       
                </div>
  
                <div class="container my-5">
        <h3 class="text-center mb-5">MANAGEMENT</h3>

        <!-- Director -->
        <div class="text-center">
            @foreach ($executives->take(1) as $executive)
                
            
            <div class="chart-card p-3 d-inline-block">
                <img src="{{ asset('upload/images/executives/'.$executive->image) }}" alt="Director" />
                <h5 class="name mt-2">{{ ucfirst($executive->name) }}</h5>
                <p class="title">{{ ucfirst($executive->designation) }}</p>
            </div>
            @endforeach
        </div>

        <!-- Vertical Line under Director -->
        <div class="connector"></div>
        <div class="child-connector-point"></div>

        <!-- Horizontal Line (Connects to Subordinates) -->
        <div class="horizontal-line-container">
            <div class="line"></div>
        </div>

        <!-- Subordinates -->
        <div class="row text-center">
            <!-- Manager -->
            @foreach ($executives->skip(1) as $executive)
            <div class="col-md-3">
                <div class="child-connector"></div>
                <div class="child-connector-point"></div>
                <div class="chart-card p-3">
                    <img src="{{ asset('upload/images/executives/'.$executive->image) }}" alt="Manager" />
                    <h5 class="name mt-2">{{ ucfirst($executive->name) }}</h5>
                    <p class="title">{{ ucfirst($executive->designation) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>



          </div>
      
        


          
        @endsection