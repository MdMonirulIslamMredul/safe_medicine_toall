 <!-- Slider Section Start -->

 <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
     <ol class="carousel-indicators">
         <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li data-target="#bannerCarousel" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>"></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ol>

     <!-- Wrapper for slides -->
     <div class="carousel-inner">
         <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="item <?php echo e($key == 0 ? 'active' : ''); ?>">

             <img src="<?php echo e(asset($banner->image)); ?>" alt="<?php echo e($banner->title); ?>" class="img-responsive"
                 style="height: 580px; width: 100%; object-fit: cover;">

             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                 style="top: 60%; transform: translateY(-50%);">
                 <?php if(session()->get('language') == 'bangla'): ?>
                 <?php echo e($banner->title_bn); ?>

                 <?php elseif(session()->get('language') == 'arabic'): ?>
                 <?php echo e($banner->title_ab); ?>

                 <?php else: ?>
                 <h2 class="text-white"><?php echo e($banner->title); ?></h2>
                 <?php endif; ?>

                 <p><?php echo e($banner->short_details); ?></p>

                 <a class="btn btn-theme-colored btn-circled pl-20 pr-20" href="<?php echo e(route('all.donation')); ?>">
                     <?php if(session()->get('language') == 'bangla'): ?>
                     দান করুন
                     <?php elseif(session()->get('language') == 'arabic'): ?>
                     تبرع الآن
                     <?php else: ?>
                     Donate Now
                     <?php endif; ?>
                 </a>
             </div>

         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </div>

     <!-- Left and right controls -->
     <a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#bannerCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>


 <!-- Slider Section End -->



 
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\slider\slider.blade.php ENDPATH**/ ?>