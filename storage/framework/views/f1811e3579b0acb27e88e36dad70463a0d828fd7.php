<?php $__env->startSection('title'); ?>
    Services
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
                <h1 class="page-title">Courses</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Course</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="courses-item">
                                <div class="courses-grid">
                                    <div class="img-part">
                                        <a href=""><img src="<?php echo e(asset($service->main_image)); ?>" height="250px" width="100%" alt=""></a>
                                    </div>
                                    <div class="content-part">

                                        <div class="course-price">
                                            <span class="price">$ <?php echo e($service->price); ?></span>
                                        </div>
                                        <h3 class="title"><a href="<?php echo e(route('services.details',['id'=>$service->id])); ?>"><?php echo e($service->service_title); ?></a></h3>

                                        <a href="<?php echo e(route('services.details',['id'=>$service->id])); ?>" class="link" style="color: #FF5421">
                                            <?php if(session()->get('language')== 'bangla'): ?> এখন তালিকাভুক্ত করুন <?php else: ?> Enroll Now <?php endif; ?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo $services->links(); ?>

            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\services\all_services.blade.php ENDPATH**/ ?>