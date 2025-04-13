@extends('frontend.layouts.master')
@section('content')
    <style>
        #container {
            max-width: 550px;
        }

        .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }

        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #007bff;
            line-height: 30px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #007bff;
            z-index: -1;
        }

        #multi-step-form {
            overflow-x: hidden;
        }

        .donate-box {
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
            padding: 20px;
            background-color: #f8f9fa;
        }

        .donate-header {
            background-color: #cce9d9;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .progress {
            height: 5px;
            border-radius: 50px;
            overflow: hidden;
        }

        .progress-bar {
            background-color: #007bff;
        }
    </style>
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Donate Now</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Donate</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <section class="contact-section padding">
        <div class="section-heading text-center mb-40">
            <h2><i class="fa fa-heart"></i> Donate Now</h2>
            <span class="heading-border"></span>
            <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
        </div>

        <div class="container mt-5">
            <div class="donate-box">
                <div class="donate-header">
                    <h3>Make a Difference</h3>
                </div>
                <div id="container mt-2">
                    <div class="progress px-1">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="step-container d-flex justify-content-between mt-3">
                        <div class="step-circle" onclick="displayStep(1)">1</div>
                        <div class="step-circle" onclick="displayStep(2)">2</div>
                    </div>

                    <form id="multi-step-form" action="{{ route('donate.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="step step-1">

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Full Name"
                                        aria-label="name" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" aria-label="email"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Donation Amount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-money"></i></span>
                                    <input type="number" min="100" class="form-control" name="amount"
                                        placeholder="Enter Donation Amount" aria-label="amount"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message (Optional)</label>
                                <textarea class="form-control" id="message" name="message" rows="3"
                                    placeholder="Your message"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary next-step w-100" >Next</button>
                        </div>

                        <div class="step step-2">
                            @if($bank != null)
                            <div class="mb-3 text-center">
                                <img src="{{ asset('upload/images/bank_accounts/'.$bank->account_qr ?? 'N/A') }}"  class="w-25" alt="QR Code">
                                <h2>OR</h2>
                                <hr>
                            </div>
                            <div class="divider my-4">

                                <div class="bank-detail">
                                    <h2>Bank Detail's</h2>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Bank Name </strong> <br>
                                            <strong>Bank Branch </strong> <br>
                                            <strong>Account Name </strong> <br>
                                            <strong>Account Number </strong><br>
                                            <strong>PhonePay Number </strong><br>
                                        </div>
                                        <div class="col-md-8">
                                            <span>:{{ $bank->bank_name ?? 'N/A' }}</span><br>
                                            <span>:{{ $bank->bank_branch ?? 'N/A'}}</span> <br>
                                            <span>:{{ $bank->account_name ?? 'N/A'}}</span><br>
                                            <span>:{{ $bank->account_number ?? 'N/A'}}</span><br>
                                            <span>:{{ $bank->mobile_number ?? 'N/A'}}</span><br>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>


                            @endif
                            <div class="mb-3">
                                <label for="screenshot" class="form-label">Upload Transaction Screenshot:</label>
                                <input type="file" id="screenshot" name="receipt" class="form-control" accept="image/*">
                            </div>
                            <button type="button" class="btn btn-primary prev-step w-25">Previous</button>
                            <button type="submit" class="btn btn-success w-50">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var currentStep = 1;
        var updateProgressBar;

        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 2) {
                $(".step-" + currentStep).hide();
                $(".step-" + stepNumber).show();
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        $(document).ready(function() {
            $('#multi-step-form').find('.step').slice(1).hide();

            $(".next-step").click(function() {
                if (currentStep < 2) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                    currentStep++;
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep).show().addClass(
                            "animate__animated animate__fadeInRight");
                        updateProgressBar();
                    }, 500);
                }
            });

            $(".prev-step").click(function() {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                    currentStep--;
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                        $(".step-" + currentStep).show().addClass(
                            "animate__animated animate__fadeInLeft");
                        updateProgressBar();
                    }, 500);
                }
            });

            updateProgressBar = function() {
                var progressPercentage = ((currentStep - 1) / 1) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            }
        });
    </script>
@endsection
