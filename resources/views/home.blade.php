@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @if (count(Auth::user()->homes))
          @foreach(Auth::user()->homes as $home)
          <div class="card">
            <div class="card-header">
              {{$home->location}}
              <button type="button" class="close" onclick="">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
              <i class="fas fa-map-marker-alt d-inline"></i>
              <p class="h6 d-inline">{{ $home->city }}</p><br>
              <p>
                {{ $home->description }}
              </p>
              <a href="/homes/{{ $home->slug }}" class="btn btn-primary">Check it</a>
              <a href="/homes/{{ $home->slug }}/edit" class="btn btn-primary">Edit</a>
            </div>
          </div>
          <br>

          @endforeach
          <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              New home ?
            </button>
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">House Detials</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data" id="newHome1" action="/homes">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="homelocation">Home Location</label>
                      <input type="text" class="form-control {{ $errors->has('location') ? 'animated shake is-danger' : ''}}" name="location" id="homelocation" aria-describedby="homeTitle" placeholder="Enter your home location" value="{{ old('location') }}">
                    </div>
                    <div class="form-group">
                      <label for="homecity">Home City</label>
                      <input type="text" class="form-control {{ $errors->has('city') ? 'animated shake is-danger' : ''}}" name="city" id="homecity" aria-describedby="homeTitle" placeholder="Enter your home city" value="{{ old('city') }}">
                    </div>
                    <div class="form-group">
                      <label for="homedesc">Home Description</label>
                      <textarea class="form-control {{ $errors->has('description') ? 'animated shake is-danger' : ''}}" name="description" id="homedesc" rows="3" placeholder="enter home description here">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="photo">Choose your featured house image</label>
                      <input type="file" name="photo" id="photo">
                    </div>
                    <div class="form-group">
                {{-- <label for="homeimage">Home Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'animated shake is-danger' : ''}}" name="image" id="homeimage" aria-describedby="homeTitle" placeholder="Enter your home image"
                value="{{ old('image') }}"> --}}
                <label for="photos">Choose your house images</label><br>
                <input type="file" name="photos[]" id="photos" multiple>
              </div>
              <div class="form-group">
                <label for="homesprice">Sell price</label>
                <input type="text" class="form-control {{ $errors->has('saleprice') ? 'animated shake is-danger' : ''}}" name="saleprice" id="homesprice" aria-describedby="homeTitle" value="{{ old('saleprice') }}" placeholder="Enter your desired price">
              </div>
            </form>
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
             @foreach($errors->all() as $error)
             {{ $error }}<br>
             @endforeach
           </div>

           @endif
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="document.getElementById('newHome1').submit()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  @else
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    New home ?
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">House Detials</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" action="/homes">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="homelocation">Home Location</label>
              <input type="text" class="form-control {{ $errors->has('location') ? 'animated shake is-danger' : ''}}" name="location" id="homelocation" aria-describedby="homeTitle" placeholder="Enter your home location" value="{{ old('location') }}">
            </div>
            <div class="form-group">
              <label for="homecity">Home City</label>
              <input type="text" class="form-control {{ $errors->has('city') ? 'animated shake is-danger' : ''}}" name="city" id="homecity" aria-describedby="homeTitle" placeholder="Enter your home city" value="{{ old('city') }}">
            </div>
            <div class="form-group">
              <label for="homedesc">Home Description</label>
              <textarea class="form-control {{ $errors->has('description') ? 'animated shake is-danger' : ''}}" name="description" id="homedesc" rows="3" placeholder="enter home description here">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="photo">Choose your featured house image</label>
              <input type="file" name="photo" id="photo">
            </div>
            <div class="form-group">
                {{-- <label for="homeimage">Home Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'animated shake is-danger' : ''}}" name="image" id="homeimage" aria-describedby="homeTitle" placeholder="Enter your home image"
                value="{{ old('image') }}"> --}}
                <label for="photos">Choose your house images</label><br>
                <input type="file" name="photos[]" id="photos" multiple>
              </div>
              <div class="form-group">
                <label for="homesprice">Sell price</label>
                <input type="text" class="form-control {{ $errors->has('saleprice') ? 'animated shake is-danger' : ''}}" name="saleprice" id="homesprice" aria-describedby="homeTitle" value="{{ old('saleprice') }}" placeholder="Enter your desired price">
              </div>
            </form>
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
             @foreach($errors->all() as $error)
             {{ $error }}<br>
             @endforeach
           </div>

           @endif
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
</div>
</div>
</div>
</div>
@endsection
