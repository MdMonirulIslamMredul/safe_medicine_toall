<?php $__env->startSection('title'); ?>
    Doctors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f" style="background-image: url(<?php echo e(asset($banner->image)); ?>);">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Testimonials</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?> </a></li>
                        <li>Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Testimonial Section Start -->
        <section class="testimonial-wrap style2 ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="testimonial-card style2">
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="<?php echo e(asset($testimonial->image)); ?>" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3><?php echo e($testimonial->name); ?></h3>
                                        <span><?php echo e($testimonial->designation); ?></span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                            </div>

                            <ul class="ratings list-style">
                                <?php for($i=0;$i<$testimonial->star;$i++): ?>
                                    <li><i class="ri-star-fill"></i></li>
                                <?php endfor; ?>
                            </ul>
                            <p class="client-quote"><?php echo $testimonial->review; ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->

    </div>
    <!-- Content wrapper end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\testimonial\testimonial_page.blade.php ENDPATH**/ ?>