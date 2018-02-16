@extends('layouts.app')

@section('content')
<div class="well">
    <div class="container">
    <h3>Edit Listing</h3>
    {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) !!}
    <div class="form-group col-sm-12 col-md-4">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title,['class'=> 'form-control', 'placeholder'=> 'ex. Used 2018 Ford Explorer'])}}
    </div>
        <div class="form-group col-sm-12 col-md-4">
            {{Form::label('year', 'Year Model')}}
            {{Form::text('year', $post->year,['class'=> 'form-control', 'placeholder'=> 'ex. 2018'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('make', 'Make')}}
                {{Form::text('make', $post->make,['class'=> 'form-control', 'placeholder'=> 'ex. Ford'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('model', 'Model')}}
                {{Form::text('model', $post->model,['class'=> 'form-control', 'placeholder'=> 'ex. Explorer'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('price', 'Price')}}
                {{Form::text('price', $post->price,['class'=> 'form-control', 'placeholder'=> 'ex. 7500'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('extColor', 'Exterior Color')}}
                {{Form::text('extColor', $post->extColor,['class'=> 'form-control', 'placeholder'=> 'ex. White'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('intColor', 'Interior Color')}}
                {{Form::text('intColor', $post->intColor,['class'=> 'form-control', 'placeholder'=> 'ex. Black'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('mileage', 'Mileage')}}
                {{Form::text('mileage', $post->mileage,['class'=> 'form-control', 'placeholder'=> 'ex. 150000'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('mpgCity', 'City MPG')}}
                {{Form::text('mpgCity', $post->mpgCity,['class'=> 'form-control', 'placeholder'=> 'ex. 25'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('mpgHwy', 'Highway MPG')}}
                {{Form::text('mpgHwy', $post->mpgHwy,['class'=> 'form-control', 'placeholder'=> 'ex. 30'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('bodyStyle', 'Body Style')}}
                {{Form::text('bodyStyle', $post->bodyStyle,['class'=> 'form-control', 'placeholder'=> 'ex. Convertible'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('driveType', 'Drive Type')}}
                {{Form::text('driveType', $post->driveType,['class'=> 'form-control', 'placeholder'=> 'ex. Rear Wheel Drive'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('engine', 'Engine')}}
                {{Form::text('engine', $post->engine,['class'=> 'form-control', 'placeholder'=> 'ex. 2.8L V6'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('transmission', 'Transmission')}}
                {{Form::text('transmission', $post->transmission,['class'=> 'form-control', 'placeholder'=> 'ex. Manual'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('fuelType', 'Fuel Type')}}
                {{Form::text('fuelType', $post->fuelType,['class'=> 'form-control', 'placeholder'=> 'ex. Gasoline'])}}
        </div>
        <div class="form-group col-sm-12 col-md-4">
                {{Form::label('vin', 'VIN')}}
                {{Form::text('vin', $post->vin,['class'=> 'form-control', 'placeholder'=> 'ex. HSG34G67SKI5UD67'])}}
        </div>
        <div class="form-group col-sm-12 col-md-8">
                {{Form::label('features', 'List any aditional features separated by commas')}}
                {{Form::textarea('features', $post->features,['class'=> 'form-control', 'placeholder'=> 'ex. Sirius Radio, Auto-Start Key Fob, etc.'])}}
        </div>
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary col-sm-12 col-md-4 pull-right'])}}
    
    </div>
</div>
    {!! Form::close() !!}
@endsection