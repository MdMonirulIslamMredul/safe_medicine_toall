<?php $__env->startSection('title'); ?>
    Research
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
                <h1 class="page-title">Research</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Research</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row grid">
                    <?php $__currentLoopData = $researches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 grid-item filter1">
                            <div class="mb-30" style="border: 1px solid #dfe9eb;transition: all 0.3s ease;">
                                <div class="">
                                    <img src="<?php echo e(asset($research->main_image)); ?>" width="100%" style="height: 250px" alt="">
                                </div>
                                <?php $timestamp = strtotime($research->created_at); $month = date('M', $timestamp);$year = date('Y', $timestamp);?>
                                <div class="content-part p-3">
                                    <ul class="meta-part">
                                        <li><i style="color: #FF5421" class="fa fa-calendar me-2"></i>&nbsp;<?php echo e($month); ?> <?php echo e($research->created_at->format('d')); ?>, <?php echo e($year); ?></li>
                                    </ul>
                                    <h3 class="title"><a style="color: #FF5421" href=""><?php echo e($research->title??null); ?></a></h3>
                                    <div><?php echo $research->short_details??null; ?></div>
                                    <div class="bottom-part">
                                        <div class="info-meta">

                                        </div>
                                        <div class="btn-part">
                                            <a style="color: #FF5421" href="<?php echo e(route('research.details',['id'=>$research->id])); ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo e($researches->links()); ?>

            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\research\research_page.blade.php ENDPATH**/ ?>