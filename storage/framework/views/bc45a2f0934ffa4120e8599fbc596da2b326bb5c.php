<div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 mb-50 md-mb-30 text-center">
            <div class="sub-title primary"><?php if(session()->get('language') == 'bangla'): ?> প্রশংসাপত্র <?php else: ?> Testimonial <?php endif; ?></div>
            <h2 class="title white-color"><?php echo e($testimonial_title->title??null); ?></h2>
        </div>
        <div class="rs-carousel owl-carousel"
             data-loop="true"
             data-items="2"
             data-margin="30"
             data-autoplay="true"
             data-hoverpause="true"
             data-autoplay-timeout="5000"
             data-smart-speed="800"
             data-dots="true"
             data-nav="false"
             data-nav-speed="false"

             data-md-device="2"
             data-md-device-nav="false"
             data-md-device-dots="true"
             data-center-mode="false"

             data-ipad-device2="1"
             data-ipad-device-nav2="false"
             data-ipad-device-dots2="true"

             data-ipad-device="2"
             data-ipad-device-nav="false"
             data-ipad-device-dots="true"

             data-mobile-device="1"
             data-mobile-device-nav="false"
             data-mobile-device-dots="false">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="testi-item">
                    <div class="author-desc">
                        <img class="quote" style="height: 50px;width: 50px;margin: auto" src="<?php echo e(asset('/')); ?>frontend/assets/images/testimonial/main-home/test-2.png" alt="">
                        <div class="desc"><?php echo $testimonial->review; ?></div>
                        <div class="author-img">
                            <img src="<?php echo e(asset($testimonial->image)); ?>" style="width: 100px; height: 100px" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#"><?php echo e($testimonial->name); ?></a>
                        <span class="designation"><?php echo e($testimonial->designation); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\testimonial\testimonial.blade.php ENDPATH**/ ?>