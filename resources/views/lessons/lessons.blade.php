@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')


<div class="container">
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link" href="#">All Lessons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">My Lessons</a>
        </li>
    </ul>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/76/Steve_Jobs_with_MacBook_Air_2.jpg" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Entrepreneur</h5>
                    <p class="card-text">Answer the questions related to the entrepreneur or companys.</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2016/01/17/15/15/albert-einstein-1145030_1280.jpg" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Historical Figure</h5>
                    <p class="card-text">How many historical figure do you know?</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src={{asset('images/Martin_Luther_KingJr.jpeg')}} class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Entrepreneur</h5>
                    <p class="card-text">Answer the questions related to the entrepreneur or companys.</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/76/Steve_Jobs_with_MacBook_Air_2.jpg" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Entrepreneur</h5>
                    <p class="card-text">Answer the questions related to the entrepreneur or companys.</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/76/Steve_Jobs_with_MacBook_Air_2.jpg" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Entrepreneur</h5>
                    <p class="card-text">Answer the questions related to the entrepreneur or companys.</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/76/Steve_Jobs_with_MacBook_Air_2.jpg" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title">Entrepreneur</h5>
                    <p class="card-text">Answer the questions related to the entrepreneur or companys.</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')