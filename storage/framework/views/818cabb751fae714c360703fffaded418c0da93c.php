<section class="bg-silver-light">
    <div class="container pt-50 pb-50">
      <div class="row">
        <div class="col-md-12">          
          <h3 class="text-uppercase title line-bottom mt-0 mb-30 text-center"><i class="fa fa-calendar text-gray-darkgray mr-10"></i><?php if(session()->get('language')=='bangla'): ?> আমাদের প্রতিনিয়ত <?php elseif(session()->get('language') == 'arabic'): ?>
            منتظمنا <?php else: ?> Our Regular <?php endif; ?>  <span class="text-theme-colored"> <?php if(session()->get('language')=='bangla'): ?> অংশীদার <?php elseif(session()->get('language') == 'arabic'): ?> الشركاء <?php else: ?> Partners <?php endif; ?>  </span></h3>
          <!-- Section: Donors -->
          <div class="owl-carousel-6col text-center">
            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item"> <a href="#"><img src="<?php echo e(asset($partner->image)); ?>" alt=""></a></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </div>
        </div>
      </div>
    </div>
  </section><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/partners/partners.blade.php ENDPATH**/ ?>