<?php $__env->startSection('title'); ?>
Department Details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="<?php echo e(asset($department->banner_image)); ?>">
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

<div class="container mt-30 mb-30 pt-30 pb-30">


    <!-- Card with Shadow -->
    <div class="panel panel-default card-shadow-lg">
        <div class="panel-body">
            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15 mb-30">
                <ul>
                    <li class="font-16 text-white font-weight-600">
                        <?php echo e(Carbon\Carbon::parse($department->created_at)->format('d')); ?></li>
                    <li class="font-12 text-white text-uppercase">
                        <?php echo e(Carbon\Carbon::parse($department->created_at)->format('M')); ?></li>
                </ul>
            </div>
            <h2> <?php if(session()->get('language') == 'bangla'): ?>
                <?php echo $department->title_bn; ?>


                <?php else: ?>
                <?php echo $department->title_en; ?>

                <?php endif; ?></h2>

            <!-- Row 1: Thumbnail Image -->
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="<?php echo e(asset('images/'.$department->thumbnil_img)); ?>" alt="Thumbnail Image">
                    </div>
                </div>
            </div>

            <!-- Row 2: Description -->
            <div class="row">
                <div class="col-md-12">
                    <p class="mt-10">
                        <?php if(session()->get('language') == 'bangla'): ?>
                        <?php echo $department->des_bn; ?>


                        <?php else: ?>
                        <?php echo $department->des_en; ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <!-- Row 3: Image1 and Description2 -->
            <div class="row">
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <img src="<?php echo e(asset('images/'.$department->image1)); ?>" alt="Thumbnail Image">
                </div>
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <p class="mt-10">
                        <?php if(session()->get('language') == 'bangla'): ?>
                        <?php echo $department->des2_bn; ?>


                        <?php else: ?>
                        <?php echo $department->des2_en; ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <!-- Row 4: Image3 and Image4 -->
            <div class="row">
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30 ">
                    <img src="<?php echo e(asset('images/'.$department->image2)); ?>" alt="Thumbnail Image">
                </div>
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <img src="<?php echo e(asset('images/'.$department->image3)); ?>" alt="Thumbnail Image">
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\department\department_details.blade.php ENDPATH**/ ?>