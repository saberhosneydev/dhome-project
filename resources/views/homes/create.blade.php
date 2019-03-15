@extends('../layouts.layout')

@section('content')
<div class="row">
    <div class="col offset-3">
        <form method="POST"action="/homes">
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
                <label for="homeimage">Home Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'animated shake is-danger' : ''}}" name="image" id="homeimage" aria-describedby="homeTitle" placeholder="Enter your home image" 
                value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="homesprice">Sell price</label>
                <input type="text" class="form-control {{ $errors->has('saleprice') ? 'animated shake is-danger' : ''}}" name="saleprice" id="homesprice" aria-describedby="homeTitle" value="{{ old('saleprice') }}" placeholder="Enter your desired price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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