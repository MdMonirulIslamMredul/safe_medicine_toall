<?php $__env->startSection('title'); ?>
    Consultancy
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="<?php echo e(asset($consultancy->banner_image)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title"><?php echo e($consultancy->title); ?></h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li><?php echo e($consultancy->title); ?></li>
                </ul>

            </div>

        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container-fluid">
                <div class="blog-deatails">
                    
                    <div class="blog-full">
                        <div class="row">
                            <div class="col-4 col-md-2" >
                                <div style="width: 250px;height:300px;border:2px solid black">
                                    <img src="<?php echo e(asset($consultancy->image)); ?>" alt="image" style="width: 100%;height:100%">
                                </div>
                            </div>
                            <div class="col-8 col-md-10 p-0">
                               <h2><?php echo e($consultancy->name); ?></h2>
                               <h4>Designation: <?php echo e($consultancy->designation); ?></h4>
                            </div>
                        </div>
                        <div class="post-para mt-5">
                            <div class="row">
                                <?php echo $consultancy->details1; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\consultancy\consultancy_page.blade.php ENDPATH**/ ?>