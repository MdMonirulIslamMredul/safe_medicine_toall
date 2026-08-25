<?php $__env->startSection('title'); ?>
    Projects
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo e(asset('frontend/images/bg/bg1.jpg')); ?>">
    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-white"><?php if(session()->get('language')=='bangla'): ?> প্রজেক্ট বিস্তারিত <?php else: ?> Project Details <?php endif; ?> </h3>

            <ul class="breadcrumb white">
              <li><a href="<?php echo e(url('/')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a></li>
              <li class="active">Project Details</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h2><?php if(session()->get('language')=='bangla'): ?> <?php echo e($project_details->title_bangla); ?> <?php else: ?> <?php echo e($project_details->title); ?> <?php endif; ?> </h2>
          <div class="owl-carousel-1col" data-nav="true">
            <div class="item">
              <img src="<?php echo e(asset($project_details->image)); ?>" alt="">
            </div>
            <div class="item">
              <img src="<?php echo e(asset($project_details->image)); ?>" alt="">
            </div>
            <div class="item">
              <img src="<?php echo e(asset($project_details->image)); ?>" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-50">
          <h4 class="mt-0"><?php if(session()->get('language')=='bangla'): ?> প্রজেক্ট বিস্তারিত <?php else: ?> Project Details <?php endif; ?></h4>
          <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $project_details->short_des_bangla; ?> <?php else: ?> <?php echo $project_details->short_des_eng; ?> <?php endif; ?> </p>

        </div>
      </div>
      <div class="row mt-20">
        <div class="col-md-12">
          <h4 class="mt-0"><?php if(session()->get('language')=='bangla'): ?> প্রজেক্ট বিস্তারিত <?php else: ?> Project Details <?php endif; ?></h4>
          <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $project_details->short_des_bangla; ?> <?php else: ?> <?php echo $project_details->short_des_eng; ?> <?php endif; ?> </p>
        </div>

      </div>





      </div>
    </div>
  </section>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\projects\project_details.blade.php ENDPATH**/ ?>