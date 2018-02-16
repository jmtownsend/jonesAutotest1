@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 20px;">
        <div class="col-md-9">
                <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.4646394534175!2d-78.99478198517242!3d34.617696780455866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89aae737700b8b67%3A0x3887be338e42a891!2sJones+Auto+Sales!5e0!3m2!1sen!2sus!4v1517495946989" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>                    </div>
        </div>    
            <div class="col-md-3">
                <h3 style="padding: 0; margin:0;">Contact Us</h3>
                <div class="contact-form contact-form-box border mt-30 mb-30 pull-left">
                    <form>
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" required="" type="text">
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="contact-email" name="contact-email" placeholder="Email" required="" type="text">
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required="" type="text">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        </div>

                        <button type="button" id="submit" name="submit" class="btn btn-default col-md-12 btn-lg text-center float-right">Send</button>
                    </form>
                </div>

                <ul class="social-network social-circle border">
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="ti-facebook"></i></a></li>
                </ul>
            </div>
        </div><!--/ row -->
    </div><!--/ container -->

    
	
@endsection