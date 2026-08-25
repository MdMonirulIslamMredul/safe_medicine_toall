<?php $__env->startSection('content'); ?>



 <!-- Section: inner-header -->
 <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="<?php echo e($banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg')); ?>">

    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            
            <ul class="breadcrumb white">
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container pt-20 pb-20">
      <div class="esc-heading lr-line left-heading">

      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="vertical-tab">
            <ul class="nav nav-tabs">
                
                <?php $__currentLoopData = $about_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if($item->id == $key+1): ?> active <?php endif; ?>"><a href="#<?php echo e($key); ?>" data-toggle="tab" style="color:green"><?php if(session()->get('language')=='bangla'): ?> <h3 style="color: green"><?php echo e($item->title_bangla); ?></h3> <?php elseif(session()->get('language')=='arabic'): ?> <h3 style="color: green"><?php echo e($item->title_ab); ?></h3> <?php else: ?> <h3 style="color: green"><?php echo e($item->title); ?></h3> <?php endif; ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content">
            <?php $__currentLoopData = $about_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade in <?php if($item->id == $key+1): ?> active <?php endif; ?> " id="<?php echo e($key); ?>">
              <div class="row">

                <div class="col-md-12">
                    <h3 style="color:green"><?php if(session()->get('language')=='bangla'): ?> <?php echo e($item->title_bangla); ?> <?php elseif(session()->get('language')=='arabic'): ?> <?php echo e($item->title_ab); ?> <?php else: ?> <?php echo e($item->title); ?> <?php endif; ?> </h3>
                  <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $item->des_bangla; ?> <?php elseif(session()->get('language')=='arabic'): ?> <?php echo $item->des_ab; ?> <?php else: ?> <?php echo $item->des_eng; ?> <?php endif; ?> </p>

                </div>
              </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>

      </div>

    </div>
  </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\about_menu\about_menu_page.blade.php ENDPATH**/ ?>