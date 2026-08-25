

<!-- Section: project -->
<section id="blog">
    <div class="container pb-sm-30">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-uppercase line-bottom-center mt-0">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            আমাদের কার্যক্রম
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            أنشطتنا 
                        <?php else: ?>
                            Our Activities
                        <?php endif; ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-xl-3" style="margin-top: 20px;">
                        <div class="post mb-sm-30 custom_card" style="border-radius: 20px; over-flow: hidden">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="<?php echo e(asset($activity->image)); ?>" alt=""
                                        class="img-responsive img-fullwidth"
                                        style="height: 300px; border-top-right-radius: 20px; border-top-left-radius: 20px;">
                                </div>
                            </div>
                            <div class="entry-content p-20" style="border-radius: 20px; over-flow: hidden">
                                <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600"
                                        href="blog-single-left-sidebar.html">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            <?php echo e($activity->bangla_title); ?>

                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            <?php echo e($activity->arabic_title); ?>

                                        <?php else: ?>
                                            <?php echo e($activity->title); ?>

                                        <?php endif; ?>
                                    </a></h4>
                                <div style="width:100%;height:130px; overflow-y: scroll;">
                                    <p class="mt-2">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            <?php echo $activity->short_des_bangla; ?>

                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            <?php echo $activity->short_des_arabic; ?>

                                        <?php else: ?>
                                            <?php echo $activity->short_des_eng; ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="" style="text-align: center; margin-top: 10px;">
                                    <a href="<?php echo e(route('all.activies', $activity->id)); ?>"
                                        class="btn_custom" style="">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            বিস্তারিত পড়ুন
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            اقرأ أكثر
                                        <?php else: ?>
                                            Read more
                                        <?php endif; ?>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\activities\activities.blade.php ENDPATH**/ ?>