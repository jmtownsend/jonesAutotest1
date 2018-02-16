@extends('layouts.app')

@section('content')
<section class="padding" style="padding: 25px;">
    <div class="container">
        <div class="row">
			<h3 class="heading col-md-12" style="font-size: 28px; padding-bottom: 15px;">Browse All Listings</h3>
    @if(count($posts)>=1)
		@foreach($posts as $post)
		@if(auth::check())
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
								@if($post->sold !==1)
								<span class="offer-box-price">{{'$'.number_format($post->price)}}</span>
								@else
								<span class="offer-box-price">Sold</span>
								@endif
								<span class="offer-box-label" style="background:none;">
										@if(auth::check())
										{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', "class"=> 'pull-right'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class'=> 'btn btn-danger pull-right'])}}
										{!!Form::close()!!}	
										<a href="/posts/{{$post->id}}/edit" class="btn btn-warning pull-right">Edit</a>
										<a href="/posts/{{$post->id}}/sell" class="btn btn-success pull-right">Sell</a>							
										@endif
								</span>
								@if(date_diff(date_modify(date_create(date('Y-m-d')),'+1 day'),date_create( $post->created_at))->format('%a') < 4)
								<span class="offer-box-label"><span class="ti-star"></span>New</span>	
								@endif
							</div>
							
							<span class="h4 offer-box-title"><a href="/browse/{{$post->vin}}"> {{$post->title}}</a>
								
							</span>
							
						</a>
							<span class="offer-box-meta" style="display:none;">{{$post->title}}, {{'$'.number_format($post->price)}}, {{$post->created_at}}</span>
						</a>
					</div>
				</div>
			<!-- / single offer box-->
			@elseif($post->sold !== 1)
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
								@if($post->sold !==1)
								<span class="offer-box-price">{{'$'.number_format($post->price)}}</span>
								@else
								<span class="offer-box-price">Sold</span>
								@endif
								<span class="offer-box-label" style="background:none;">
										@if(auth::check())
										{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', "class"=> 'pull-right'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class'=> 'btn btn-danger pull-right'])}}
										{!!Form::close()!!}	
										<a href="/posts/{{$post->id}}/edit" class="btn btn-warning pull-right">Edit</a>
										<a href="/posts/{{$post->id}}/sell" class="btn btn-success pull-right">Sell</a>							
										@endif
								</span>
								@if(date_diff(date_modify(date_create(date('Y-m-d')),'+1 day'),date_create( $post->created_at))->format('%a') < 4)
								<span class="offer-box-label"><span class="ti-star"></span>New</span>	
								@endif
							</div>
							
							<span class="h4 offer-box-title"><a href="/browse/{{$post->vin}}"> {{$post->title}}</a>
								
							</span>
							
						</a>
							<span class="offer-box-meta" style="display:none;">{{$post->title}}, {{'$'.number_format($post->price)}}, {{$post->created_at}}</span>
						</a>
					</div>
				</div>
			<!-- / single offer box-->
			@endif
        @endforeach
    @else
        <p> Error: No cars found.</p>
	@endif
			</div>
			<div style="text-align: center;">
			{{$posts->links()}}
			</div>
    </div>
</section>
@endsection