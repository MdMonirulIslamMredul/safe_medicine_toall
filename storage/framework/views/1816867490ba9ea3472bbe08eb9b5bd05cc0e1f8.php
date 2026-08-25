<?php $__env->startSection('title'); ?>
    Services
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
 
                <img src="<?php echo e(asset($banner->image)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Courses</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Course</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container" style="">
                <div class="row">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <a href="<?php echo e(asset($notice_detail->pdf_file)); ?>"><h2 style="background-color: #ff5421;text-align:center;padding: 10px;margin-top:30px;color:white">Click to Download the PDF File</h2></a>
                                </div>
                                <div class="col-md-2">
                                    <div style="width: 120px;height:120px;background-color:#ff5521bc;border-radius:5px; text-align:center;padding:3px">
                                        <span class="text-white" style="letter-spacing: 3px;"><?php echo e(Carbon\Carbon::parse($notice_detail->creadted_at)->format('l')); ?></span> <br>
                                        <span class="text-white" style="font-weight: 700;font-size:20px"><?php echo e(Carbon\Carbon::parse($notice_detail->creadted_at)->format('d')); ?></span><br>
                                        <span class="text-white" style="letter-spacing: 3px;"><?php echo e(Carbon\Carbon::parse($notice_detail->creadted_at)->format('F')); ?></span><br>
                                        <span class="text-white" style="font-weight: 700;font-size:20px;letter-spacing: 3px;"><?php echo e(Carbon\Carbon::parse($notice_detail->creadted_at)->format('Y')); ?></span>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 ">
                                <div class="col-md-12">
                                    <?php echo $notice_detail->short_des; ?>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <?php echo $notice_detail->long_des; ?>

                                </div>
                            </div>
                        </div>
                      </div>


                </div>

            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\notice\notice_details.blade.php ENDPATH**/ ?>