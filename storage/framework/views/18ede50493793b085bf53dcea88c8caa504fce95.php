<?php $__env->startSection('title'); ?>
    Blogs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    


    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo e(asset($banner->image)); ?>">
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
        <div class="container">
            <div class="row multi-row-clearfix">
                <div class="blog-posts">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="<?php echo e(asset($blog->main_image)); ?>" alt=""
                                            class="img-responsive img-fullwidth" style="height: 350px">
                                    </div>
                                </div>
                                <div class="entry-content p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">
                                                    <?php echo e(Carbon\Carbon::parse($blog->created_at)->format('d')); ?></li>
                                                <li class="font-12 text-white text-uppercase">
                                                    <?php echo e(Carbon\Carbon::parse($blog->created_at)->format('M')); ?></li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="#">
                                                        <?php if(session()->get('language') == 'bangla'): ?>
                                                            <?php echo e($blog->title_bn); ?>

                                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                                            <?php echo e($blog->title_ab); ?>

                                                        <?php else: ?>
                                                            <?php echo e($blog->title); ?>

                                                        <?php endif; ?>
                                                    </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            <?php echo $blog->details1_bn; ?>

                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            <?php echo $blog->details1_ab; ?>

                                        <?php else: ?>
                                        <?php echo substr($blog->details1, 0,300,); ?>

                                        <?php endif; ?>
                                    </p>
                                    <a href="<?php echo e(route('blogs.details', $blog->id)); ?>" class="btn-read-more">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            বিস্তারিত পড়ুন
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            قراءة التفاصيل
                                        <?php else: ?>
                                        <button class="btn btn-copy-link btn-danger">
                                            <i class="fa fa-book"></i> Read More
                                        </button>
                                        <?php endif; ?>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-12">
                        <?php echo e($blogs->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\blogs\blogs_page.blade.php ENDPATH**/ ?>