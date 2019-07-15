<?php /* C:\Users\Saber\home\dhome-project\resources\views/layouts/layout.blade.php */ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(config('app.name')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <?php echo $__env->yieldContent('customHeader'); ?>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><?php echo e(config('app.name')); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/homes" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Buy
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/homes">See homes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sell
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rent
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">

                <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>" style="color: #f6993f;">Signup<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>" style="color: #f6394c;">Login</a>
                </li>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">
                        <?php echo e(__('Dashboard')); ?>

                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">
                        <?php echo e(__('Settings')); ?>

                    </a>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>


                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <?php echo $__env->yieldContent('content'); ?>
    
    <div class="footer bg-dark text-light">
        <div class="row">
            <div class="col-5">
                <a href="#" class="logowithtext">
                    <i class="fab  fa-5x fa-fort-awesome-alt"></i>
                    <p><?php echo e(config('app.name')); ?></p>
                </a>

                <p class="h6 slogan">
                    We Will make Impossible just for you :)
                </p>

                <div class="social">
                    <i class="fab fa-2x fa-facebook-f"></i>
                    <i class="fab fa-2x fa-twitter"></i>
                    <i class="fab fa-2x fa-youtube"></i>
                    <i class="fab fa-2x fa-instagram"></i>
                </div>
            </div>
            <div class="col foot-links">
                <h2>Our services</h2>
                <ul>
                    <li><a href="">Property Valuation</a></li>
                    <li><a href="">Prices Guide</a></li>
                    <li><a href="">Market Research</a></li>
                    <li><a href="">Real Estate Index</a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
            <div class="col foot-links">
                <h2>Other Links</h2>
                <ul>
                    <li><a href=""></a></li>
                    <li><a href="">Jobs</a></li>
                    <li><a href="">Companies Registration</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href=""></a>Terms and Conditions</li>
                    <li><a href="">Latest Listings</a></li>
                    <li><a href=""></a>D.Home Blog</li>
                </ul>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>

<?php echo $__env->yieldContent('customJavaScript'); ?>
</body>
</html>