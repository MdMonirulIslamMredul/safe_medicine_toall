<div id="rs-blog" class="rs-blog main-home pb-100 pt-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 text-center mb-50">
            <div class="sub-title"> <?php if(session()->get('language') == 'bangla'): ?> সর্বশেষ সংবাদ <?php elseif(session()->get('language')=='arabic'): ?> সর্বশেষ সংবাদ <?php else: ?> News Update <?php endif; ?></div>

            <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->page == 'blogs' ): ?>
                    <h2 class="title"><?php echo e($data->title); ?></h2>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
            <?php if($blogs != null): ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="blog-item">
                <div class="image-part">
                    <img src="<?php echo e(asset($blog->main_image)); ?>" width="100" alt="">
                </div>
                    <?php $timestamp = strtotime($blog->created_at); $month = date('M', $timestamp);$year = date('Y', $timestamp);?>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li><i class="fa fa-calendar"></i><?php echo e($month); ?> <?php echo e($blog->created_at->format('d')); ?>, <?php echo e($year); ?></li>
                    </ul>
                    <h3 class="title"><a href="<?php echo e(route('blogs.details',['id'=>$blog->id])); ?>"><?php echo e($blog->title); ?></a></h3>
                    <div class="desc"><?php echo $blog->short_details; ?></div>
                    <div class="btn-btm">

                        <div class="rs-view-btn">
                            <a href="<?php echo e(route('blogs.details',['id'=>$blog->id])); ?>">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\blogs\blogs.blade.php ENDPATH**/ ?>