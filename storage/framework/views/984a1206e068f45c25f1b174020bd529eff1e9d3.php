<?php $__env->startSection('title'); ?>
    <?php if(session()->get('language') == 'bangla'): ?>
        সরাসরি সম্প্রচার
    <?php elseif(session()->get('language') == 'arabic'): ?>
        البث التلفزيوني المباشر
    <?php else: ?>
        Live Tv
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_style'); ?>
    <style>
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #29b54e;
            border-color: #29b54e;
        }

        .custom_card img {
            width: 100%;
            height: 350px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensure the image covers the area without distortion */
            border-radius: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content Start -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="<?php echo e($banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg')); ?>">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        
                        <ul class="breadcrumb white">
                            
                            <li class="active">
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Audio Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-7">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-12">
                                <a href="">
                                    <div class="custom_card"
                                        style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                                        <?php if($tv->file_upload && file_exists(public_path('file_upload/' . $tv->file_upload))): ?>
                                            <video controls width="100%">
                                                <source src="<?php echo e(asset('file_upload/' . $tv->file_upload)); ?>"
                                                    type="video/<?php echo e(pathinfo($tv->file_upload, PATHINFO_EXTENSION)); ?>">
                                                Your browser does not support the video element.
                                            </video>
                                        <?php else: ?>
                                            
                                            <!-- Blade Template -->


                                            
                                              <?php
                                              $videoLink = $tv->embed_video;

                                              if (str_contains($videoLink, 'youtu.be') || str_contains($videoLink, 'youtube.com')) {
                                                  // YouTube link
                                                  $embedLink = str_replace('youtu.be/', 'www.youtube.com/embed/', strtok($videoLink, '?'));
                                              } elseif (str_contains($videoLink, 'vimeo.com')) {
                                                  // Vimeo link
                                                  $videoId = substr(parse_url($videoLink, PHP_URL_PATH), 1); // Extract video ID
                                                  $embedLink = "https://player.vimeo.com/video/" . $videoId;
                                              } elseif (preg_match('/\.(mp4|webm|ogg)$/', $videoLink)) {
                                                  // Direct video file (mp4, webm, ogg)
                                                  $embedLink = $videoLink;
                                              } else {
                                                  // If the platform is unknown, just display the raw link as a fallback
                                                  $embedLink = null;
                                              }
                                          ?>

                                          <?php if($embedLink): ?>
                                              <?php if(preg_match('/youtube.com|vimeo.com/', $embedLink)): ?>
                                                  <!-- Embed YouTube or Vimeo Video -->
                                                  <iframe width="560" height="315" src="<?php echo e($embedLink); ?>" frameborder="0" allowfullscreen></iframe>
                                              <?php elseif(preg_match('/\.(mp4|webm|ogg)$/', $embedLink)): ?>
                                                  <!-- Direct Video File -->
                                                  <video width="560" height="315" controls>
                                                      <source src="<?php echo e($embedLink); ?>" type="video/<?php echo e(pathinfo($embedLink, PATHINFO_EXTENSION)); ?>">
                                                      Your browser does not support the video tag.
                                                  </video>
                                              <?php else: ?>
                                                  <!-- For unsupported platforms, display the video link -->
                                                  <a href="<?php echo e($videoLink); ?>" target="_blank"><?php echo e($videoLink); ?></a>
                                              <?php endif; ?>
                                          <?php else: ?>
                                              <p>Unsupported video format or link.</p>
                                          <?php endif; ?>



                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2>
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    কোন ভিডিও পাওয়া যায়নি
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    لم يتم العثور على فيديو
                                <?php else: ?>
                                    No Video Found
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5  align-items-center ">
                    <p><?php if(session()->get('language') == 'bangla'): ?>
                       <?php echo e($tv->short_details_bn); ?>

                    <?php else: ?>
                    <?php echo e($tv->short_details_en); ?>

                    <?php endif; ?></p>
                </div>

                
            </div>

            <div class="col-lg-12 col-md-12  align-items-center">
                <p><?php if(session()->get('language') == 'bangla'): ?>
                    <?php echo $tv->details_bn; ?>

                <?php else: ?>
                <?php echo $tv->details_en; ?>

                <?php endif; ?></p>
            </div>

        </div>
    </div>
    <!-- Audio Section End -->


    
    <!-- Main content End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\tv\tv_page.blade.php ENDPATH**/ ?>