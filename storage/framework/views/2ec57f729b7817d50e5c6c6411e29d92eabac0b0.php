<?php /* C:\Users\Saber\home\dhome-project\resources\views/homes/show.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="row fRow">
	<div class="col">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?php echo e(asset('/storage/'.$home->image)); ?>" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				<?php $__currentLoopData = $home->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="carousel-item">
					<img src="<?php echo e(asset('/storage/'.$image->image_name)); ?>" class="d-block w-100" alt="/imgs/img1.jpg">
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		<p class="h2"><?php echo e($home->location); ?></p>
		<i class="fas fa-map-marker-alt d-inline"></i>
		<p class="h6 d-inline"><?php echo e($home->city); ?></p><br>
		<i class="fas fa-user d-inline"></i>
		<p class="h6 d-inline"><?php echo e($home->user->name); ?></p>
		<p>
			<?php echo e($home->description); ?>

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
		<h3>$<?php echo e($home->saleprice); ?></h3>
		<hr>
		<i class="fas fa-circle d-inline" style="color:purple;"></i>
		<p class="d-inline">FOR RENT</p>
		<h3>$<?php echo e($home->rentprice); ?>/mo</h3>
		<hr>

		<?php if(Auth::id() == $home->user->id): ?>
		<a href="/homes/<?php echo e($home->slug); ?>/edit"><i class="fas fa-2x fa-pencil-alt text-dark"></i></a>
		<a href="#"><i class="fas fa-2x fa-heart text-dark"></i></a>
		<form method="POST" action="/homes/<?php echo e($home->slug); ?>/sold">
			<?php echo e(csrf_field()); ?>

			<?php echo method_field('PATCH'); ?>
			<?php if($home->sold): ?>
			<i class="fas fa-2x fa-check-square d-inline" style="color: #4dabf7;"></i>
			<p class="h5 d-inline" style="font-size: 2em;color: #4dabf7;">SOLD</p>
			<?php else: ?>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="defaultCheck1"
				onchange="this.form.submit()">
				<label class="form-check-label" for="defaultCheck1">
					Sold ?
				</label>
			</div>
			<?php endif; ?>
		</form>
		<hr>
		<?php endif; ?>


	</div>
	<div class="col-3">
		<?php if(Auth::user()): ?>
		<?php if(Auth::user()->ready): ?>
		<?php if(Session('message')): ?>
		<div class="alert alert-success">
			<h5>Request recieved , we will contact you soon .</h5>
		</div>

		<?php else: ?>
		<form action="/sendapplication" method="POST">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="homeSLUG" value="<?php echo e($home->slug); ?>">
			<h5>To place an order , please send a request and one of our agents will contact you .</h5>
			<hr>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
		</form>
		<?php endif; ?>

		<?php else: ?>
		<p>You need to update your contact info <br>
			You can do it at <a href="/dashboard/account">account settings</a> .
		</p>
		<?php endif; ?>
		<?php else: ?>
		<p>Please signup first</p>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJavaScript'); ?>
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo e($home->lat); ?>, lng: <?php echo e($home->long); ?>};
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>