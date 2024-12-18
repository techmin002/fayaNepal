@extends('frontend.layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<style>
        .main-div {
            /* background: linear-gradient(135deg, #6a11cb, #2575fc); */
            color: #fff;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            /* min-height: 50vh; */
            margin: 50px 0px;
            

        }
        

        .donation-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            color: #333;
            /* text-align: center; */
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .donation-title {
            font-size: 28px;
            font-weight: bold;
            color: #01923f;
            margin-bottom: 20px;
            text-align:center;
        }
        .input-group-text-add {
            background: #6e8efb !important;
            color: #fff !important;
            border-radius: 20px 0 0 20px !important;
            display: flex;
            align-items: center;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            text-align: center;
            white-space: nowrap;
            background-color: var(--bs-tertiary-bg);
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: var(--bs-border-radius);
        }

        .title {
            font-weight: bold;
            color: #6e8efb;
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .btn-primary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            border-radius: 30px;
            font-size: 18px;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
        }

        .form-control {
            border-radius: 20px;
            /* margin-bottom: 15px; */
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
            text-align:center !important;
            align-items:center !important;
        }

        .qr-code {
            max-width: 100%;
            border: 2px solid #6a11cb;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .lable-name-form{
          font-weight:600
        }
        .divider {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    text-align: center;
}
.divider::before,
.divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #ddd;
    margin: 0 10px;
}
    </style>

<script>
        function submitDonation() {
            const fileInput = document.getElementById('screenshot');
            if (fileInput.files.length > 0) {
                alert('Thank you for your donation! Your transaction has been submitted successfully.');
                document.getElementById('donateForm').reset();
                const modalElement = document.getElementById('qrModal');
                const modal = bootstrap.Modal.getInstance(modalElement);
                modal.hide(); // Close the modal
            } else {
                alert('Please upload the transaction screenshot before proceeding.');
            }
        }
    </script>
@section('content')
        <!-- body -->
        <section class="team-section bg-grey bd-bottom circle shape ">
            <div class="container">
                <!-- <div class="section-heading text-center mb-40">
                    <h2>Meet Our Team</h2>
                    <span class="heading-border"></span>
                    <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
                </div> -->
                <div class="main-div">
    <div class="donation-card">
        <div class="donation-title">
            <i class="fas fa-heart"></i> Donate Now
        </div>
        <form>
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label lable-name-form">Your Name</label>
                <div class="input-group">
                    <span class="input-group-text-add"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label lable-name-form">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text-add"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
            </div>

            <!-- Donation Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label lable-name-form">Donation Amount</label>
                <div class="input-group">
                    <span class="input-group-text-add"><i class="fas fa-dollar-sign"></i></span>
                    <input type="number" class="form-control" id="amount" placeholder="Enter amount" required>
                </div>
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label for="message" class="form-label lable-name-form">Message (Optional)</label>
                <textarea class="form-control" id="message" rows="3" placeholder="Your message"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <!-- <button type="submit" class="btn btn-donate">
                    Donate Now <i class="fas fa-arrow-right"></i>
                </button> -->
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#qrModal">
                    Donate Now <i class="fas fa-qrcode"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- QR Code Popup Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="qrModalLabel">Scan QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- QR Code -->
                    <img src="https://via.placeholder.com/250" class="qr-code" alt="QR Code">
                    <div class="divider my-4">
                       <h2>OR</h2>

                      </div>
                    <!-- Upload Screenshot -->
                    <div class="mt-2">
                        <label for="screenshot" class="form-label">Upload Transaction Screenshot:</label>
                        <input type="file" id="screenshot" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submitDonation()">Done</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
      </div>
             
            </div>
        </section><!-- /Team Section -->
        <!-- @endsection -->