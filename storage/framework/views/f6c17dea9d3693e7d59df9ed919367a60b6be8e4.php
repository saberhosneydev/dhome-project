<?php /* C:\Users\Saber\home\dhome-project\resources\views/home.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          <?php if(session('status')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

          </div>
          <?php endif; ?>
          <?php if(Auth::user()->ready): ?>
          <?php if(count(Auth::user()->homes)): ?>
          <?php $__currentLoopData = Auth::user()->homes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card">
            <div class="card-header">
              <?php echo e(Str::title($home->location)); ?>

              <button type="button" class="close" onclick="">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
              <i class="fas fa-map-marker-alt d-inline"></i>
              <p class="h6 d-inline"><?php echo e($home->city); ?></p><br>
              <p>
                <?php echo e($home->description); ?>

              </p>
              <a href="/homes/<?php echo e($home->slug); ?>" class="btn btn-primary">Check it</a>
              <a href="/homes/<?php echo e($home->slug); ?>/edit" class="btn btn-primary">Edit</a>
            </div>
          </div>
          <br>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              New home ?
            </button>
          </div>
          <?php else: ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            New home ?
          </button>
          <?php endif; ?>

          <?php else: ?>
          <p>You need to update your contact info first. <br>
            You can do it at <a href="/dashboard/account">account settings</a> .
          </p>
          <?php endif; ?>

          
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
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                      <label for="homelocation">Home Location</label>
                      <input type="text" class="form-control <?php echo e($errors->has('location') ? 'animated shake is-danger' : ''); ?>" name="location" id="homelocation" aria-describedby="homeTitle" placeholder="Enter your home location" value="<?php echo e(old('location')); ?>">
                    </div>
                    <div class="form-group">
                      <label for="homecity">Home City</label>
                      <input type="text" class="form-control <?php echo e($errors->has('city') ? 'animated shake is-danger' : ''); ?>" name="city" id="homecity" aria-describedby="homeTitle" placeholder="Enter your home city" value="<?php echo e(old('city')); ?>">
                    </div>
                    <div class="form-group">
                      <label for="homedesc">Home Description</label>
                      <textarea class="form-control <?php echo e($errors->has('description') ? 'animated shake is-danger' : ''); ?>" name="description" id="homedesc" rows="3" placeholder="enter home description here"><?php echo e(old('description')); ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="photo">Choose your featured house image</label>
                      <input type="file" name="photo" id="photo">
                    </div>
                    <div class="form-group">
                
                <label for="photos">Choose your house images</label><br>
                <input type="file" name="photos[]" id="photos" multiple>
              </div>
              <div class="form-group">
                <label for="homesprice">Sell price</label>
                <input type="text" class="form-control <?php echo e($errors->has('saleprice') ? 'animated shake is-danger' : ''); ?>" name="saleprice" id="homesprice" aria-describedby="homeTitle" value="<?php echo e(old('saleprice')); ?>" placeholder="Enter your desired price">
              </div>
            </form>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php echo e($error); ?><br>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>

           <?php endif; ?>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="document.getElementById('newHome1').submit()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>