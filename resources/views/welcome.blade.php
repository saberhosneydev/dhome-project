@extends('layouts.layout')

@section('customHeader')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">Ready for your next Dream Home ?</h1>
        <p class="lead">We offers unique premium entertainment, Whether you like House of IT's or Old-School lover , We got it all for you with just few clicks.</p>
        <div class="input-group m-auto">
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search it now">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    @if (count($homes) > 0)
    <div class="row">
            @foreach($homes as $home)
        <div class="col-3 ">
            <div class="card">
                <img src="{{ $home->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $home->location }}</h5>
                    <span><i class="fas fa-map-marker-alt"></i> {{ $home->city }}</span>
                    <p class="card-text">{{ str_limit($home->description, 25, ' ...') }}</p>
                    <a href="/homes/{{ $home->slug }}" class="btn btn-primary">Check it</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        @else
            <p class="display-4" style="text-align: center;">Nothing to show, yet.</p>
        @endif
    <div class="row">
        <div class="col">
            <img class="img-fluid" src="{{ asset('imgs/fill.jpg') }}" alt="">
        </div>
        <div class="col text-center">
            <p class="display-4">Dumby Text</p>
            <p class="lead text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
        </div>
    </div>
@endsection