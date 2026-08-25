<?php $__env->startSection('title'); ?>
    Gallery
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_style'); ?>
    <!-- Masonry CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.min.css">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        .grid-item {
            /* position: relative; */
            width: 24%;
            margin: .25%;
        }
        .grid-item .overlay-shade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.716);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .grid-item:hover .overlay-shade {
            opacity: 1;
        }
        .icons-holder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
        }
        .grid-item:hover .icons-holder {
            opacity: 1;
        }
        .icons-holder-inner {
            display: inline-block;
        }
        .styled-icons {
            font-size: 24px;
            color: green;
        }
        .grid-item img {
            width: 100%;
            display: block;
        }
        @media (max-width: 992px) {
            .grid-item {
                width: 32.333%;
                margin: .33%;
            }
        }
        @media (max-width: 768px) {
            .grid-item {
                width: 49%;
                margin: .50%;
            }
        }
        @media (max-width: 576px) {
            .grid-item {
                width: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

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
    <section id="gallery">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title line-bottom mt-0 mb-30 text-center"><i
                                class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                            <?php if(session()->get('language') == 'bangla'): ?>
                                ফটো
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                صورة
                            <?php else: ?>
                                Photo
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

                        <!-- Portfolio Gallery Grid -->
                        <div class="grid">
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="grid-item">
                                    <a href="<?php echo e(asset($gallery->image)); ?>" data-lightbox="gallery">
                                        <img src="<?php echo e(asset($gallery->image)); ?>" alt="gallery image">
                                        <div class="overlay-shade"></div>
                                        <div class="icons-holder">
                                            <div class="icons-holder-inner">
                                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                    <i class="fa fa-picture-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End Portfolio Gallery Grid -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('frontend_script'); ?>
    <!-- Masonry JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elem = document.querySelector('.grid');
            var msnry = new Masonry(elem, {
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                percentPosition: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\gallery\gallery_page.blade.php ENDPATH**/ ?>