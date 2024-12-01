@extends('frontend.layouts.master')
@section('content')

    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Contact With Us</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="contact-section padding">
        <div id="google_map"></div><!-- /#google_map -->
        <div class="container">
            <div class="row contact-wrap">
                <div class="col-md-6 xs-padding">
                    <div class="contact-info">
                        <h3>Get in touch</h3>
                        <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                            Sudurpashchim Province Nepal, the abused and the helpless.</p>

                        <ul>
                            <li><i class="ti-location-pin"></i> {{ $data['profile']->company_address }}</li>
                            <li><i class="ti-mobile"></i> {{ $data['profile']->company_phone }}</li>
                            <li><i class="ti-email"></i> {{ $data['profile']->company_email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="contact-form">
                        <h3>Drop us a line</h3>
                        <p>Have questions or want to get involved? Drop us a line, and we'll be happy to connect with you
                            and explore ways to collaborate!</p>
                        <form action="{{ route('frontend.contact.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="number" name="contact" id="" class="form-control"
                                        placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default-btn" type="submit">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 xs-padding">
                    <div class="contact-info text-center">
                        <h3>Get Direction</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4251.467780088977!2d80.5931636!3d28.7015952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a1ed26bb510b2b%3A0xb8228b1094bb86d!2sFAYA%20Nepal!5e1!3m2!1sen!2snp!4v1732803580604!5m2!1sen!2snp"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection
