@extends('../layouts.layout')

@section('customHeader')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">Looking for home to Buy or Rent ?</h1>
    <p class="lead">Use the dropdown below to customize your search to look for homes available to buy or rent.</p>
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
            <img src="{{asset('/storage/'.$home->image)}}" class="card-img-top" alt="...">
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
@endsection