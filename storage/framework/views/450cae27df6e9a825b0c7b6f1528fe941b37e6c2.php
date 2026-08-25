<?php $__env->startSection('title'); ?>
    Doctors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="<?php echo e(asset($banner->image)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Team One</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Team</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Team Section Start -->
        <div id="rs-team" class="rs-team style1 orange-color pt-94 pb-100 md-pt-64 md-pb-70 white-bg">
            <div class="container">
                <h2 class="text-center mb-5"><?php echo e($banner->title??null); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6 mb-30">
                        <div class="team-item">
                            <img src="<?php echo e(asset($team->image)); ?>" alt="">
                            <div class="content-part">
                                <h4 class="name text-light"><?php echo e($team->name); ?></h4>                                <span class="designation"><?php echo e($team->designation); ?></span>
                                <ul class="social-links">
                                    <li><a href="<?php echo e($team->facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo e($team->youtube); ?>"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a href="<?php echo e($team->linkedIn); ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo e($team->instagram); ?>"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php echo $teams->links(); ?>

            </div>
        </div>
        <!-- Team Section End -->


    </div>
    <!-- Main content End -->
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\team\team_page.blade.php ENDPATH**/ ?>