@extends('layouts.basic')
@section('title')
Location
@endsection
@section('active')
Location
@endsection
@section('content')
<div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <header class="single-post-header clearfix">
              <h2 class="post-title">Our Location</h2><br>
              <h4>Orient Pearl Building, CM Recto Avenue, Quiapo, Manila, 1001 Metro Manila, Philippines</h4>
            </header>
            <div class="post-content">
              <div id="gmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d965.234251190366!2d120.98610424252271!3d14.602664405176911!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1394831272857"></iframe>
              </div>
              <div class="row">
                <form method="post" id="contactform" name="contactform" class="contact-form" action="http://html.imithemes.com/nativechurch/mail/contact.php">
                  <div class="col-md-6 margin-15">
                    <div class="form-group">
                      <input type="text" id="name" name="name" class="form-control input-lg" placeholder="Name*">
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email*">
                    </div>
                    <div class="form-group">
                      <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea cols="6" rows="7" id="comments" name="comments" class="form-control input-lg" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                  </div>
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div id="message"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop