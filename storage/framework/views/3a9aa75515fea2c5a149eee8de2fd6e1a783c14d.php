<?php $__env->startSection('content'); ?>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="<?php echo e(asset('frontend/images/bg/bg1.jpg')); ?>">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                আমাদের কার্যক্রম
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                أنشطتنا
                            <?php else: ?>
                                Our Activities
                            <?php endif; ?>
                        </h3>
                        <ul class="breadcrumb white">
                            <li><a href="<?php echo e(url('/')); ?>">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        হোম
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        بيت
                                    <?php else: ?>
                                        Home
                                    <?php endif; ?>
                                </a></li>
                            <li class="active">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    আমাদের কার্যক্রম
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    أنشطتنا
                                <?php else: ?>
                                    Our Activities
                                <?php endif; ?>
                            </li>
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
                            
                            <?php $__currentLoopData = $all_activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($item->id == $single_activity->id): ?> active <?php endif; ?>"><a href="#<?php echo e($key); ?>"
                                        data-toggle="tab" style="color:green">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            <?php echo e($item->bangla_title); ?>

                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            <?php echo e($item->arabic_title); ?>

                                        <?php else: ?>
                                            <?php echo e($item->title); ?>

                                        <?php endif; ?>
                                    </a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <?php $__currentLoopData = $all_activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade in <?php if($item->id == $single_activity->id): ?> active <?php endif; ?>"
                                id="<?php echo e($key); ?>">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h3 style="color:green">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo e($item->bangla_title); ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo e($item->arabic_title); ?>

                                            <?php else: ?>
                                                <?php echo e($item->title); ?>

                                            <?php endif; ?>
                                        </h3>
                                        <p>
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo e($item->short_des_bangla); ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo e($item->short_des_arabic); ?>

                                            <?php else: ?>
                                                <?php echo e($item->short_des_eng); ?>

                                            <?php endif; ?>
                                        </p>

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

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\activities\all_activities.blade.php ENDPATH**/ ?>