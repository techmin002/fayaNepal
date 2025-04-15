@extends('frontend.layouts.master')
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
        /* Card Styling - Same for all cards */
        .chart-card {
            background-color: #f8f9fa !important;
            border-radius: 10px !important;
            text-align: center !important;
            box-shadow: 3px 1px 5px  #da251c !important;
            height: 300px; /* Fixed height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px !important;
            margin: 0 auto; /* Center the card */
            max-width: 250px; /* Optional: Limits card width */
        }
        .chart-card .card-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .chart-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
        }
        .name {
            font-weight: 600;
            color: #01923f;
            margin-bottom: 5px;
        }
        .title {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 5px;
            line-height: 1.3;
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
                    <p>"FAYA Nepal’s dynamic and dedicated management team is the driving force behind our mission to create lasting social impact. Bringing together diverse expertise, the team provides strategic leadership, ensures operational excellence, and fosters sustainable growth. United by a shared commitment to accountability and innovation, they combine passion and professionalism to empower communities and propel transformative changes across all our initiatives."</p>
                </div>

                <div class="container my-5">
        <h3 class="text-center mb-5">MANAGEMENT</h3>

        <!-- Director -->
        <div class="row text-center justify-content-center"> <!-- Added row and justify-content-center -->
            @foreach ($executives->take(1) as $executive)
            <div class="col-md-3"> <!-- Wrapped in col-md-3 like subordinates -->
                <div class="chart-card p-3"> <!-- Removed d-inline-block -->
                    <div class="card-content">
                        <img src="{{ asset('upload/images/executives/'.$executive->image) }}" alt="Director" />
                        <h5 class="name mt-2">{{ ucfirst($executive->name) }}</h5>
                        <p class="title">{{ ucfirst($executive->designation) }}</p>
                        <p class="title">{{ ucfirst($executive->phone) }}</p>
                        <p class="title">{{ ucfirst($executive->email) }}</p>
                    </div>
                </div>
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
            @foreach ($executives->skip(1) as $executive)
            <div class="col-md-3">
                <div class="child-connector"></div>
                <div class="child-connector-point"></div>
                <div class="chart-card p-3">
                    <div class="card-content">
                        <img src="{{ asset('upload/images/executives/'.$executive->image) }}" alt="Manager" />
                        <h5 class="name mt-2">{{ ucfirst($executive->name) }}</h5>
                        <p class="title">{{ ucfirst($executive->designation) }}</p>
                        <p class="title">{{ ucfirst($executive->phone) }}</p>
                        <p class="title">{{ ucfirst($executive->email) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
          </div>
        @endsection
