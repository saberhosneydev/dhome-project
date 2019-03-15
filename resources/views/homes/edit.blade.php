@extends('../layouts.layout')

@section('content')
<div class="row">
    <div class="col offset-3">
        <p class="h3">Edit this home.</p>
        <form method="POST"action="/homes/{{ $home->slug }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="homelocation">Home Location</label>
                <input type="text" class="form-control {{ $errors->has('location') ? 'animated shake is-danger' : ''}}" name="location" id="homelocation" aria-describedby="homeTitle" placeholder="Enter your home location" value="{{ $home->location }}">
            </div>
            <div class="form-group">
                <label for="homecity">Home City</label>
                <input type="text" class="form-control {{ $errors->has('city') ? 'animated shake is-danger' : ''}}" name="city" id="homecity" aria-describedby="homeTitle" placeholder="Enter your home city" value="{{ $home->city }}">
            </div>
            <div class="form-group">
                <label for="homedesc">Home Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'animated shake is-danger' : ''}}" name="description" id="homedesc" rows="3">{{ $home->description }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="homeimage">Home Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'animated shake is-danger' : ''}}" name="image" id="homeimage" aria-describedby="homeTitle" placeholder="Enter your home image" 
                value="{{ $home->image }}">
            </div>
            <div class="form-group">
                <label for="homesprice">Sell price</label>
                <input type="text" class="form-control {{ $errors->has('saleprice') ? 'animated shake is-danger' : ''}}" name="saleprice" id="homesprice" aria-describedby="homeTitle" value="{{ $home->saleprice }}" placeholder="Enter your desired price">
            </div>
            <label for="rentprice">Rent price (by default rent price equal sale price / 180)</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" name="rentprice" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="leave blank if you want to use above formula">
            <div class="input-group-append">
                <span class="input-group-text">/mo</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="_method" value="PATCH">Update</button>
        <button type="submit" class="btn btn-primary" name="_method" value="DELETE">Delete</button>
    </form>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
       @foreach($errors->all() as $error)
       {{ $error }}<br>
       @endforeach
   </div>
   
   @endif
</div>
<div class="col-3"></div>
</div>
@endsection