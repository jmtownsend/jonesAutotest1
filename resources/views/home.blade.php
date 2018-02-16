@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard | Welcome {{auth::User()->name}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Listing</a>
                    <a href="/browse" class="btn btn-success">Show All Listings</a>
                    @if(auth::User()->name == 'Jake Townsend' || auth::User()->name == 'Buddy Jones' || auth::User()->name == 'Brad Jones')
                    <a href="/register" class="btn btn-warning">Register New User</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
