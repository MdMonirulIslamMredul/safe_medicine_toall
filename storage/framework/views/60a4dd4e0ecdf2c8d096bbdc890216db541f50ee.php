<?php $__env->startSection('title'); ?>
    Gallery
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo e(asset('frontend/images/bg/bg1.jpg')); ?>">
    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-white"><?php if(session()->get('language')=='bangla'): ?> আসন্ন প্রকল্প <?php else: ?> Upcomeing Project <?php endif; ?> </h3>

            <ul class="breadcrumb white">
              <li><a href="<?php echo e(url('/')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a></li>
              <li class="active">Upcomeing Project</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <h2 style="text-align: center"><?php if(session()->get('language')=='bangla'): ?> <?php echo e($upcome_project_details->bangla_title); ?> <?php else: ?> <?php echo e($upcome_project_details->title); ?> <?php endif; ?> </h2>
          <div class="owl-carousel-1col" data-nav="true">
            <div class="item">
              <img src="<?php echo e(asset($upcome_project_details->image1 ?? null)); ?>" alt="">
            </div>
            <div class="item">
              <img src="<?php echo e(asset($upcome_project_details->image2 ?? null )); ?>" alt="">
            </div>
            <div class="item">
              <img src="<?php echo e(asset($upcome_project_details->image3 ?? null )); ?>" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-70" style="border: 1px solid green;border-radius:20px;">
            <h2></h2>
            <table>
                <tr>
                    <th>Topics:</th>
                    <td><?php echo $upcome_project_details->short_des1; ?></td>
                </tr>
                <tr>
                    <th>Host:</th>
                    <td>TecWeb Lim.</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td><?php echo e($upcome_project_details->location); ?></td>
                </tr>
                <tr>
                    <th>Start Date:</th>
                    <td><?php echo e($upcome_project_details->project_start_date); ?></td>
                </tr>
                <tr>
                    <th>End Date:</th>
                    <td>February 10, 2016</td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>kodesolution.com</td>
                </tr>
            </table>

        </div>
      </div>
      <div class="row mt-30">
        <h2><?php if(session()->get('language')=='bangla'): ?> <?php echo e($upcome_project_details->bangla_title); ?> <?php else: ?> <?php echo e($upcome_project_details->title); ?> <?php endif; ?> </h2>
        <div class="col-md-6 mt-10">
            <br>
          <div class="" >
            <div class="item">
              <?php echo $upcome_project_details->video_link1; ?>

            </div>
          </div>
        </div>
        <div class="col-md-6 mt-30">
            <br>
            <div class="" >
            <div class="item">
                <?php echo $upcome_project_details->video_link2; ?>

            </div>
            </div>

        </div>
      </div>
      <div class="row mt-20">
        <div class="col-md-12">
          <h4 class="mt-0"><?php if(session()->get('language')=='bangla'): ?> প্রজেক্ট বিস্তারিত <?php else: ?> Project Details <?php endif; ?></h4>
          <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $upcome_project_details->long_des_bangla1; ?> <?php else: ?> <?php echo $upcome_project_details->long_des1; ?> <?php endif; ?> </p>
        </div>
        <div class="col-md-12">
            <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $upcome_project_details->long_des_bangla2; ?> <?php else: ?> <?php echo $upcome_project_details->long_des2; ?> <?php endif; ?> </p>
        </div>
        <div class="col-md-12">
            <p><?php if(session()->get('language')=='bangla'): ?> <?php echo $upcome_project_details->long_des_bangla2; ?> <?php else: ?> <?php echo $upcome_project_details->long_des3; ?> <?php endif; ?> </p>
        </div>
      </div>

      </div>
    </div>
  </section>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\projects\upcome_project_details.blade.php ENDPATH**/ ?>