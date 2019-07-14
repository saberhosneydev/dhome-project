<?php /* C:\Users\Saber\home\dhome-project\resources\views/welcome.blade.php */ ?>
<?php $__env->startSection('customHeader'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/welcome.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">Ready for your next Dream Home ?</h1>
    <p class="lead">We offers unique premium entertainment, Whether you like House of IT's or Old-School lover , We got it all for you with just few clicks.</p>
    <form action="<?php echo e(route("search")); ?>" method="get">
        <div class="input-group m-auto">
         <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search it now"
         name="index">
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
</form>
</div>
<?php if(count($homes) > 0): ?>
<div class="row">
    <?php $__currentLoopData = $homes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-3 ">
        <div class="card">
            <img src="<?php echo e(asset('/storage/'.$home->image)); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($home->location); ?></h5>
                <span><i class="fas fa-map-marker-alt"></i> <?php echo e($home->city); ?></span>
                <p class="card-text"><?php echo e(str_limit($home->description, 25, ' ...')); ?></p>
                <a href="/homes/<?php echo e($home->slug); ?>" class="btn btn-primary">Check it</a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<p class="display-4" style="text-align: center;">Nothing to show, yet.</p>
<?php endif; ?>
<div class="row">
    <div class="col">
        <img class="img-fluid" src="<?php echo e(asset('imgs/fill.jpg')); ?>" alt="">
    </div>
    <div class="col text-center">
        <p class="display-4">Dumby Text</p>
        <p class="lead text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>