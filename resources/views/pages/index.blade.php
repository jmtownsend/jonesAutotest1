@extends('layouts.app')

@section('content')

	<section class="home">
		<div class="home-slider home-slider-half-page">
	        <div class="swiper-wrapper">
	            <div class="swiper-slide home-slider-centered" style="background-image:url(storage/images/frontpage.jpg)">
	           		<h1 class="light wow fadeInDown mb-30" style="text-shadow:2px 2px #000; font-size:60px;">We buy and sell<br/> used cars!</h1>
	            	<a href="/browse"class="btn btn-primary wow fadeInUp">browse <span class="ti-arrow-right light"></span></a>
	            </div>
	        </div>
	        <!-- Add Pagination -->
	        <div class="home-slider-pagination"></div>
			
			<div class="home-slider-prev left-arrow">
				<span class="ti-angle-left"></span>
			</div>

			<div class="home-slider-next right-arrow">
				<span class="ti-angle-right"></span>
			</div>
		</div>
	</section>
	<section class="padding" style="padding: 25px;">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<h3 class="heading" style="font-size: 28px; padding-bottom: 15px;">New Listings</h3>
			</div>
			@foreach($newPosts as $post)
			@if($post->sold !==1)
			<!-- / single offer box-->
			<div class="col-md-4">
					<div class="offer-box">
							<div class="offer-box-head">
								<div class="offer-slider">
									<div class="swiper-wrapper">
											@foreach($carImages as $image)
											@if($image->postID == $post->id)
											<div class="swiper-slide"><a href="/browse/{{$post->vin}}"><img src="storage/images/{{$image->link}}" alt="offer image"></a></div>
											@endif
											@endforeach
									</div>

									<div class="offer-pagination-prev left-arrow">
										<span class="ti-angle-left"></span>
									</div>

									<div class="offer-pagination-next right-arrow">
										<span class="ti-angle-right"></span>
									</div>
								</div>
								<span class="offer-box-price">{{'$'.number_format($post->price)}}</span>
								@if(date_diff(date_modify(date_create(date('Y-m-d')),'+1 day'),date_create( $post->created_at))->format('%a') < 4)
								<span class="offer-box-label"><span class="ti-star"></span>New</span>	
								@endif	
							</div>
							<a href='/browse/{{$post->vin}}'><span class="h4 offer-box-title">{{$post->title}}</span></a>
							<span class="offer-box-meta">Jones Auto Sales | {{$post->title}}</span>
					</div>
				</div>
			<!-- / single offer box-->
			@endif
			@endforeach

				<div class="col-md-12 text-center">
					<a class="btn btn-default" href="/browse?sort='new'">view all <span class="ti-angle-right"></span></a>
				</div>
			</div><!--/ row -->
		</div><!--/ container -->
	</section>
	<section class="padding" style="background: #efefef; padding: 25px;">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<h3 class="heading" style="font-size: 28px; padding-bottom: 15px;">Popular Listings</h3>
			</div>
			@foreach($popularPosts as $post)
			@if($post->sold !==1)
			<!-- / single offer box-->
			<div class="col-md-4">
					<div class="offer-box">
							<div class="offer-box-head">
								<div class="offer-slider">
									<div class="swiper-wrapper">
											@foreach($carImages as $image)
											@if($image->postID == $post->id)
											<div class="swiper-slide"><a href="/browse/{{$post->vin}}"><img src="storage/images/{{$image->link}}" alt="offer image"></a></div>
											@endif
											@endforeach
									</div>

									<div class="offer-pagination-prev left-arrow">
										<span class="ti-angle-left"></span>
									</div>

									<div class="offer-pagination-next right-arrow">
										<span class="ti-angle-right"></span>
									</div>
								</div>
								<span class="offer-box-price">{{'$'.number_format($post->price)}}</span>
								@if(date_diff(date_modify(date_create(date('Y-m-d')),'+1 day'),date_create( $post->created_at))->format('%a') < 4)
								<span class="offer-box-label"><span class="ti-star"></span>New</span>	
								@endif
							</div>
							<a href="#"> 
							<a href='/browse/{{$post->vin}}'><span class="h4 offer-box-title">{{$post->title}}</span></a>
							<span class="offer-box-meta">Jones Auto Sales | {{$post->title}}</span>
						</a>
					</div>
				</div>
			<!-- / single offer box-->
			@endif
			@endforeach
				<div class="col-md-12 text-center">
					<a class="btn btn-default" href="/browse?sort='popular'">view all <span class="ti-angle-right"></span></a>
				</div>
			</div><!--/ row -->
		</div><!--/ container -->
	</section>
@endsection