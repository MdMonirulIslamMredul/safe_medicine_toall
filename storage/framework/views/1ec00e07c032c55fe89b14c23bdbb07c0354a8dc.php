<?php $__env->startSection('title'); ?>
    Video Gallery
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content Start -->


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

    <!-- Gallery Grid 4 -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <h2 class="title line-bottom mt-0 mb-30 text-center"><i
                            class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                        <?php if(session()->get('language') == 'bangla'): ?>
                            ভিডিও
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            فيديو
                        <?php else: ?>
                            Video
                        <?php endif; ?>
                        <span class="text-theme-colored">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                গ্যালরি
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                صالة عرض
                            <?php else: ?>
                                Gallery
                            <?php endif; ?>
                        </span>
                    </h2>
                    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                             <article class="post clearfix bg-lighter mb-sm-30">
                                 <div class="card pb-0 custom_card"
                                     style="width:100%; border-radius: 20px; overflow: hidden">
                                     <!-- Wrap the video link in a div with a class -->
                                     <div class="video-wrapper"
                                         style="border-top-right-radius: 20px; border-top-left-radius: 20px; overflow: hidden;">
                                         <?php echo $video->video_link; ?>

                                     </div>
                                     <div class="card-body" style="padding: 15px;">
                                         <p class="card-text">
                                             <?php if(session()->get('language') == 'bangla'): ?>
                                                 কার্ডের শিরোনাম তৈরি করতে এবং কার্ডের বেশিরভাগ বিষয়বস্তু তৈরি করার
                                                 জন্য কিছু দ্রুত উদাহরণ পাঠ্য।
                                             <?php elseif(session()->get('language') == 'arabic'): ?>
                                                 بعض النصوص السريعة النموذجية للبناء على عنوان البطاقة وتشكيل الجزء
                                                 الأكبر من محتوى البطاقة.
                                             <?php else: ?>
                                                 Some quick example text to build on the card title and make up the bulk
                                                 of the card's content.
                                             <?php endif; ?>
                                         </p>
                                     </div>
                                 </div>
                             </article>
                         </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/gallery/video_gallery_page.blade.php ENDPATH**/ ?>