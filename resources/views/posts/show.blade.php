@extends('layouts.app')

@section('content')
<div class="container">
@if(auth::check())
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-left">Edit</a>


{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', "class"=> 'pull-left'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
</div>
<div class="container">
        <div class="row">
        <div class="col-md-12 mb-30">
            <h3 style="font-size: 40px;">{{$post->title}}</h3>
        </div>

        <div class="col-md-9">
            <div class="offer-box">
                <div class="offer-box-head" style=" background: #f3f3f3; ">
                    <div class="offer-slider swiper-container-horizontal instance-0">
                        <div class="swiper-wrapper" style="text-align: center;">
                                @foreach($carImages as $image)
                                    <div class="swiper-slide swiper-slide-active" style="width: 848px;"><img src="/storage/images/{{$image->link}}" alt="offer image"></div>
                                @endforeach
                        </div>

                        <div class="offer-pagination-prev left-arrow btn-prev-0 swiper-button-disabled">
                            <span class="ti-angle-left"></span>
                        </div>

                        <div class="offer-pagination-next right-arrow btn-next-0">
                            <span class="ti-angle-right"></span>
                        </div>
                    </div>
                    @if($post->sold !==1)
                    <span class="offer-box-price">{{'$'.number_format($post->price)}}</span>
                    @else
                    <span class="offer-box-price">Sold</span>
                    @endif	
                </div>
                <div class="offer-content">
                    <div class="offer-row row">
                        <div class="col-md-12 pl-0">
                        </hr>
                            <ul>
                                <li class="col-md-6 col-sm-6">
                                    <span class="col-md-6 bold">Posted</span>
                                    <span class="col-md-6"><?php $ago =date_diff(date_modify(date_create(date('Y-m-d')),'+1 day'),date_create( $post->created_at))->format('%a');if($ago !=0){if($ago ==1){echo $ago.' day ago';}else{echo $ago.' days ago';}}else{echo 'Today';} ?></span>
                                </li>
                                <li class="col-md-6 col-sm-6">
                                    <span class="col-md-6 bold">Date Available</span>
                                    <span class="col-md-6">{{substr($post->created_at, 5,3).substr($post->created_at, 8,2).'-'.substr($post->created_at, 0,4)}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="offer-row row">
                        <div class="col-md-2 col-sm-12 mb-15">
                            <span class="bold">Basic Information</span>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <ul>
                                <li class="col-md-6 col-sm-6"><b>Year: </b>{{$post->year}}</li>
                                <li class="col-md-6 col-sm-6"><b>Make: </b>{{$post->make}}</li>
                                <li class="col-md-6 col-sm-6"><b>Model: </b>{{$post->model}}</li>
                                <li class="col-md-6 col-sm-6"><b>Mileage: </b>{{number_format($post->mileage)}}</li>
                                <li class="col-md-6 col-sm-6"><b>Price: </b>{{'$'.number_format($post->price)}}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="offer-row row">
                        <div class="col-md-2 col-sm-12 mb-15">
                            <span class="bold">Extra Information</span>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <ul>
                                <li class="col-md-6 col-sm-6"><b>External Color: </b>{{$post->extColor}}</li>
                                <li class="col-md-6 col-sm-6"><b>Internal Color: </b>{{$post->intColor}}</li>
                                <li class="col-md-6 col-sm-6"><b>Body Style: </b>{{$post->bodyStyle}}</li>
                                <li class="col-md-6 col-sm-6"><b>Engine: </b>{{$post->engine}}</li>
                                <li class="col-md-6 col-sm-6"><b>Transmission: </b>{{$post->transmission}}</li>
                                <li class="col-md-6 col-sm-6"><b>Drive Type: </b>{{$post->driveType}}</li>
                                <li class="col-md-6 col-sm-6"><b>Fuel Type: </b>{{$post->fuelType}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="offer-row row">
                        <div class="col-md-2 col-sm-12 mb-15">
                            <span class="bold">Extra Features</span>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <ul>
                            <?php
                                $featureList = explode(",",$post->features);
                                foreach($featureList as $feature){
                                    echo '<li class="col-md-6 col-sm-6">'.$feature.'</li>';
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/ col-md-9-->
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