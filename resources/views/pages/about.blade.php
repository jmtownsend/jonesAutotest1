@extends('layouts.app')

@section('content')

<section class="padding-medium about">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
			<h3>About us</h3>
			<p style="color: #555;"> With a combined 50 years of experience, we're here to help you with your car search. Browse online and come let our friendly staff find the right car for you!</p>

			<div class="row mt-30">
				  <div class="col-md-4 wow fadeInLeft">
					<div class="services-box text-center shadow">
						<span class="icon ti-car"></span>
						<h4>We buy and sell cars.</h4>
						<p class="fixed-height" style="color: #555;">
							We offer the best price whether you're buying or selling.
						</p>
					</div>
				</div>

				<div class="col-md-4 wow fadeInDown">
					<div class="services-box text-center shadow">
						<span class="icon ti-money"></span>
						<h4>We finance</h4>
						<p class="fixed-height" style="color: #555;">
							Come find the best financing option to fit your needs.
						</p>
					</div>
				</div>

				<div class="col-md-4 wow fadeInRight">
					<div class="services-box text-center shadow">
						<span class="icon ti-search"></span>
						<h4>We offer inspections</h4>
						<p class="fixed-height" style="color: #555;">
							We offer affordable state vehicle inspections.
						</p>
					</div>
				</div>
			</div>
			
			</div><!--/ col-md-9-->
			<div class="col-md-3">
				 <div class="contact-form contact-form-box border mt-30 mb-30 pull-left">
				 <h5>Contact us</h5>
					<form class="mt-30">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" id="contact-email" name="contact-email" placeholder="Email" required>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
						</div>

						<div class="form-group">
							<textarea class="form-control" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
						</div>

						<button type="button" id="submit" name="submit" class="btn btn-default col-md-12 btn-lg text-center float-right">Send</button>
					</form>
				</div>
				
			</div>
		</div><!--/ row -->
	</div><!--/ container -->
</section>

@endsection