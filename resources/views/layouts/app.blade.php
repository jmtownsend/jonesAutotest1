<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if(isset($title))
					{{$title}}
				@else Jones Auto Sales
				@endif</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
	<body>
	<header class="header header-fixed nav-down container">
		<div class="box mb-0">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<a href="http://jonestest.dev" class="header-logo-small" style="font-family: 'Playfair', serif; font-size:33px; margin-top:0;">Jones Auto Sales</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse js-navbar-collapse row">
					<ul class="nav navbar-nav pull-right">
						<li class="header-link"><a href="/">Home</a></li>
						<li class="header-link"><a href="/about">About Us</a></li>
						<li class="header-link"><a href="/browse">Browse Listings</a></li>
						<li class="header-link"><a href="/contact">Contact Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
		@include('inc.messages')
		@yield('content')
		
	<footer class="footer">
		<div class="container">
				<hr>
			<div class="row">
				<div class="col-md-6 col-sm-12 smartphone-fw">
					<address>
					<strong>Jones Auto Sales and Services LLC</strong><br>
					1209 E 5th Street, Lumberton, NC 28358 <br><br>
					<a href="tel:910-739-0080">Phone: (910)739-0080</a> <br>
					</address>
				</div>
               <div class="col-md-2 col-sm-12 smartphone-fw pull-right">
                    <h6 class="heading">Site Map</h6>
                    <ul>
                        <li> <a href="http://jonestest.dev/index"> Home </a> </li>
                        <li> <a href="http://jonestest.dev/about"> About </a> </li>
                        <li> <a href="http://jonestest.dev/browse"> Browse Inventory </a> </li>
                        <li> <a href="http://jonestest.dev/contact"> Contact Us </a> </li>
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
						@endguest
						@if(auth::check())
						<li>
							<a href="/home">Admin Dashboard</a>
						</li>
						<li>
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
						Logout
					</a>
	
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
					@endif
                    </ul>
                </div>
                </div>				
			</div>
		</div>	
    </footer>
	<script src="{{asset('/js/wow.js')}}"></script>
	<script>
	window.jQuery || document.write('<script src="{{asset('/js/jquery-1.11.2.min.js')}}"><\/script>')
	</script>
	<script src="{{asset('js/swiper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.countTo.js')}}"></script>
	<script src="{{asset('js/jquery.inview.js')}}"></script>
	<script src="{{asset('/js/jquery.countdown.js')}}"></script>
		<script src="{{asset('/js/bootstrap-select.js')}}"></script>
	<script src="{{asset('/js/main.js')}}"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
	</body>
</html>