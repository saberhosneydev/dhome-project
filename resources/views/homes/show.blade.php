@extends('../layouts.layout')

@section('content')
<div class="row fRow">
	<div class="col">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{$home->image}}" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				<div class="carousel-item">
					<img src="/imgs/img1.jpg" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				<div class="carousel-item">
					<img src="/imgs/img1.jpg" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
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
		<div id='myMap'></div>
	</div>
</div>
<div class="row shadow-sm p-3 mb-3 bg-white rounded">
	<div class="col-6">
		<p class="h2">{{ $home->location }}</p>
		<i class="fas fa-map-marker-alt d-inline"></i>
		<p class="h6 d-inline">{{ $home->city }}</p><br>
		<i class="fas fa-map-marker-alt d-inline"></i>
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
		<a href="/homes/{{ $home->slug }}/edit"><i class="fas fa-2x fa-heart text-dark"></i></a>
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
		<p>Contact Should be placed Here</p>
	</div>
</div>
@endsection

@section('customJavaScript')
<script type='text/javascript'>
	function loadMapScenario() {
		var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {});
		var pushpin = new Microsoft.Maps.Pushpin(map.getCenter(), { icon: 'http://maps.google.com/mapfiles/kml/paddle/red-circle.png',
			anchor: new Microsoft.Maps.Point(50, 50) });
		map.entities.push(pushpin);

	}
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=ArEDEQknNcw91W5xr46-f5YFg7tPytDYJbj9kSpbSK8qWvcEhGzW1KpU3g1z3huk&callback=loadMapScenario' async defer></script>
@endsection