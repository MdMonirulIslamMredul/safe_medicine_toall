<div id="rs-popular-courses" class="rs-popular-courses main-home event-bg pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 text-center mb-45">
            <div class="sub-title"><?php if(session()->get('language') == 'bangla'): ?> কোর্স নির্বাচন করুন <?php else: ?> Select Courses <?php endif; ?> </div>
            <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->page == 'courses' ): ?>
                    <h2 class="title black-color"><?php echo e($data->title); ?></h2>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
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

                            <a href="<?php echo e(route('services.details',['id'=>$service->id])); ?>" class="link" style="color: #FF5421"> <?php if(session()->get('language') == 'bangla'): ?> এখন তালিকাভুক্ত করুন <?php else: ?> Enroll Now <?php endif; ?> </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\services\services.blade.php ENDPATH**/ ?>