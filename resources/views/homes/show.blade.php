@extends('../layouts.layout')

@section('content')
<div class="row fRow">
	<div class="col">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{asset('/storage/'.$home->image)}}" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				@foreach($home->images as $image)
				<div class="carousel-item">
					<img src="{{asset('/storage/'.$image->image_name)}}" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	</div>
	<div class="col">
		<div id="map"></div>
	</div>
</div>
<div class="row shadow-sm p-3 mb-3 bg-white rounded">
	<div class="col-6">
		<p class="h2">{{ $home->location }}</p>
		<i class="fas fa-map-marker-alt d-inline"></i>
		<p class="h6 d-inline">{{ $home->city }}</p><br>
		<i class="fas fa-user d-inline"></i>
		<p class="h6 d-inline">{{ $home->user->name }}</p>
		<p>
			{{ $home->description }}
		</p>
		<hr>
		<p class="h4">Features :</p>
		<div class="row">
			<div class="col">
				<i class="far fa-2x fa-snowflake d-inline"></i>
				<p class="h4 mb-0">COOLING</p>
				<p class="h6">No Data</p>
			</div>
			<div class="col">
				<i class="fas fa-2x fa-parking d-inline"></i>
				<p class="h4 mb-0">PARKING</p>
				<p class="h6">No Data</p>
			</div>
			<div class="col">
				<i class="far fa-2x fa-map d-inline"></i>
				<p class="h4 mb-0">SPACE</p>
				<p class="h6">No Data</p>
			</div>
		</div>

	</div>
	<div class="col-2">
		<i class="fas fa-circle d-inline" style="color:red;"></i>
		<p class="d-inline">FOR SALE</p>
		<h3>${{ $home->saleprice }}</h3>
		<hr>
		<i class="fas fa-circle d-inline" style="color:purple;"></i>
		<p class="d-inline">FOR RENT</p>
		<h3>${{$home->rentprice}}/mo</h3>
		<hr>

		@if(Auth::id() == $home->user->id)
		<a href="/homes/{{ $home->slug }}/edit"><i class="fas fa-2x fa-pencil-alt text-dark"></i></a>
		<a href="#"><i class="fas fa-2x fa-heart text-dark"></i></a>
		<form method="POST" action="/homes/{{ $home->slug }}/sold">
			{{ csrf_field() }}
			@method('PATCH')
			@if ($home->sold)
			<i class="fas fa-2x fa-check-square d-inline" style="color: #4dabf7;"></i>
			<p class="h5 d-inline" style="font-size: 2em;color: #4dabf7;">SOLD</p>
			@else
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="defaultCheck1"
				onchange="this.form.submit()">
				<label class="form-check-label" for="defaultCheck1">
					Sold ?
				</label>
			</div>
			@endif
		</form>
		<hr>
		@endif


	</div>
	<div class="col-3">
		@if(Auth::user())
		@if(Auth::user()->ready)
		@if(Session('message'))
		<div class="alert alert-success">
			<h5>Request recieved , we will contact you soon .</h5>
		</div>

		@else
		<form action="/sendapplication" method="POST">
			@csrf
			<input type="hidden" name="homeSLUG" value="{{$home->slug}}">
			<h5>To place an order , please send a request and one of our agents will contact you .</h5>
			<hr>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
		</form>
		@endif

		@else
		<p>You need to update your contact info <br>
			You can do it at <a href="/dashboard/account">account settings</a> .
		</p>
		@endif
		@else
		<p>Please signup first</p>
		@endif
	</div>
</div>
@endsection

@section('customJavaScript')
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: {{$home->lat}}, lng: {{$home->long}}};
  // The map, centered at Uluru
  var map = new google.maps.Map(
  	document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
-->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBskV8o6Oeer6MbqmX9aAtbBiLZ__exzpY&callback=initMap">
</script>
@endsection