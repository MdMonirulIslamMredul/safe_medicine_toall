<?php $__env->startSection('title'); ?>
    Blog Details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    


    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="<?php echo e(asset($blog->banner_image)); ?>">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                    বিস্তারিত সংবাদ
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                أخبار مفصلة
                                <?php else: ?>
                                    Blog Details
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
                                    বিস্তারিত সংবাদ
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                أخبار مفصلة
                                <?php else: ?>
                                    Blog Details
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">

            <div class="row multi-row-clearfix mb-30">
                <div class="col-sm-6 col-md-12 col-lg-12 text-right">
                    <div class="share-buttons">
                        <!-- Facebook Share Button -->
                        <a href="#" class="btn btn-facebook btn-primary" onclick="shareOnFacebook('<?php echo e(url('blogs-details/' .$blog->id)); ?>')">
                            <i class="fa fa-facebook"></i> Share on Facebook
                        </a>

                        <!-- WhatsApp Share Button -->
                        <a href="#" class="btn btn-whatsapp btn-success" onclick="shareOnWhatsApp('<?php echo e(url('blogs-details/' .$blog->id)); ?>')" >
                            <i class="fa fa-whatsapp"></i> Share on WhatsApp
                        </a>

                        <!-- Copy Link Button -->
                        <button class="btn btn-copy-link btn-danger" onclick="copyLink('<?php echo e(url('blogs-details/' .$blog->id)); ?>')">
                            <i class="fa fa-link"></i> Copy Link
                        </button>
                    </div>
                </div>
            </div>

            <script>

                function shareOnFacebook(postUrl) {
                    const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;
                    window.open(facebookShareUrl, '_blank');
                }

                function shareOnWhatsApp(postUrl) {
                    const whatsAppShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(postUrl)}`;
                    window.open(whatsAppShareUrl, '_blank');
                }

                function copyLink(postUrl) {
                    navigator.clipboard.writeText(postUrl).then(() => {
                        alert('Link copied to clipboard');
                    }).catch(err => {
                        console.error('Failed to copy link: ', err);
                    });
                }

                </script>


            <div class="row ">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="<?php echo e(asset($blog->main_image)); ?>" alt=""
                                                class="img-responsive img-fullwidth">
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
                                                    <h4 class="entry-title text-white text-uppercase m-0 mt-5">
                                                        <a href="#">
                                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                                <?php echo e($blog->title_bn); ?>

                                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                                <?php echo e($blog->title_ab); ?>

                                                            <?php else: ?>
                                                                <?php echo e($blog->title); ?>

                                                            <?php endif; ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-10">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo $blog->short_details_bn; ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo $blog->short_details_ab; ?>

                                            <?php else: ?>
                                                <?php echo $blog->short_details; ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="<?php echo e(asset($blog->details_image1)); ?>" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo $blog->details1_bn; ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo $blog->details1_ab; ?>

                                            <?php else: ?>
                                                <?php echo $blog->details1; ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="<?php echo e(asset($blog->details_image2)); ?>" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo $blog->details2_bn; ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo $blog->details2_ab; ?>

                                            <?php else: ?>
                                                <?php echo $blog->details2; ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="<?php echo e(asset($blog->details_image3)); ?>" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo $blog->short_details_bn; ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo $blog->short_details_ab; ?>

                                            <?php else: ?>
                                                <?php echo $blog->short_details; ?>

                                            <?php endif; ?> <br>
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo $blog->details1_bn; ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo $blog->details1_ab; ?>

                                            <?php else: ?>
                                                <?php echo $blog->details1; ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\blogs\blogs_details.blade.php ENDPATH**/ ?>