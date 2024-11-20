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
                  <p>Faya Nepal is a non-governmental, apolitical, and not-for-profit organization based in Sudurpashchim Province Nepal, the abused and the helpless.</p>
           
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
                  <p>Have questions or want to get involved? Drop us a line, and we'll be happy to connect with you and explore ways to collaborate!</p>
                  <form action="{{ route('frontend.contact.store') }}" method="post" class="form-horizontal">
                    @csrf
                      <div class="form-group colum-row row">
                          <div class="col-sm-6">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                          </div>
                          <div class="col-sm-6">
                              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                            <input type="number" name="contact" id="" class="form-control" placeholder="Contact Number">
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
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
      </div>
  </div>
</section><!-- /Contact Section -->
@endsection
