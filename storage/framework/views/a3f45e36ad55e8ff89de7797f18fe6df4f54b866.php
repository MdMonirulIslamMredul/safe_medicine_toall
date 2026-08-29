<?php $__env->startPush('frontend_style'); ?>
    <style>
        .owl-carousel-4col.owl-carousel .owl-stage {
            border-radius: 10px !important;
            overflow: hidden;
        }
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
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
        @media (min-width: 1200px) {
          .col-xl-1 { width: 8.33333%; }
          .col-xl-2 { width: 16.66667%; }
          .col-xl-3 { width: 25%; }
          .col-xl-4 { width: 33.33333%; }
          .col-xl-5 { width: 41.66667%; }
          .col-xl-6 { width: 50%; }
          .col-xl-7 { width: 58.33333%; }
          .col-xl-8 { width: 66.66667%; }
          .col-xl-9 { width: 75%; }
          .col-xl-10 { width: 83.33333%; }
          .col-xl-11 { width: 91.66667%; }
          .col-xl-12 { width: 100%; }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Slider Section Start -->
    <?php echo $__env->make('frontend.slider.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Slider Section End -->

    <!-- Section: Safe & Unsafe Medicine Verification Hub -->
    <section class="py-4 position-relative" style="background: linear-gradient(135deg, #064e3b 0%, #0f766e 100%); margin-top: -20px; z-index: 10; border-bottom: 4px solid #10b981;">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-lg-7 text-white mb-3 mb-lg-0">
                    <span class="badge badge-light text-success font-weight-bold px-3 py-1 rounded-pill mb-2">
                        <i class="fa fa-shield-alt text-success mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> ঔষধ নিরাপত্তা ও যাচাইকরণ <?php else: ?> MEDICINE SAFETY &amp; AUTHENTICITY <?php endif; ?>
                    </span>
                    <h3 class="font-weight-bold text-white mb-2" style="font-size: 26px;">
                        <?php if(session()->get('language')=='bangla'): ?>
                            আসল ও নকল ঔষধ যাচাই করুন
                        <?php else: ?>
                            Verify Safe vs. Counterfeit Medicines
                        <?php endif; ?>
                    </h3>
                    <p class="text-white-50 font-14 mb-3" style="color: #e2e8f0 !important;">
                        <?php if(session()->get('language')=='bangla'): ?>
                            DGDA নিবন্ধিত ঔষধের জেনেরিক তথ্য, প্রস্তুতকারক এবং আসল ও নকল প্যাকেজিংয়ের চাক্ষুষ তুলনা দেখে সুরক্ষিত থাকুন।
                        <?php else: ?>
                            Search Bangladesh medicine catalog, inspect genuine packaging features, and check reported fake drug alerts.
                        <?php endif; ?>
                    </p>

                    <form action="<?php echo e(route('medicines.index')); ?>" method="GET" class="d-flex max-width-600 bg-white rounded-pill p-1 shadow">
                        <input type="text" name="search" class="form-control border-0 rounded-pill px-3 font-14" placeholder="<?php if(session()->get('language')=='bangla'): ?> ঔষধের নাম দিয়ে খুঁজুন... (e.g. Napa, Seclo, Sergel) <?php else: ?> Search medicine brand or generic... <?php endif; ?>" style="box-shadow: none;">
                        <button type="submit" class="btn btn-success rounded-pill px-4 font-weight-bold text-white" style="background: #10b981; border: none;">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="col-lg-5 text-lg-right">
                    <div class="d-flex flex-column flex-sm-row justify-content-lg-end gap-2">
                        <a href="<?php echo e(route('medicines.index')); ?>" class="btn btn-light text-dark font-weight-bold px-4 py-2 rounded-pill shadow-sm mb-2 mb-sm-0 mr-sm-2">
                            <i class="fa fa-pills text-success mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> ঔষধ তালিকা <?php else: ?> View Medicines <?php endif; ?>
                        </a>
                        <a href="<?php echo e(route('medicines.index', ['status' => 'unsafe'])); ?>" class="btn btn-danger font-weight-bold px-4 py-2 rounded-pill shadow-sm mb-2 mb-sm-0 mr-sm-2">
                            <i class="fa fa-exclamation-triangle mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> নকল ঔষধ সতর্কতা <?php else: ?> Fake Drug Alerts <?php endif; ?>
                        </a>
                        <a href="<?php echo e(route('unsafe.medicine.report')); ?>" class="btn btn-outline-light font-weight-bold px-3 py-2 rounded-pill">
                            <i class="fa fa-bullhorn mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> অভিযোগ <?php else: ?> Report <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: About -->
    

    <!-- Section: About -->
    <section class="">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="text-center">

                            <img src="<?php echo e(asset($about->image1)); ?>" alt=""
                                style="width:400px;height:400px;border: 1px solid #ddd;border-radius: 5px; padding: 5px;">
                            <h1 style="color:green;font-size:1.4rem">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo e($about->director_name_bangla); ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo e($about->director_name_ab); ?>

                                <?php else: ?>
                                    <?php echo e($about->director_name); ?>

                                <?php endif; ?>
                            </h1>
                            <h3 style="color:green;font-size:1rem">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo e($about->foundation_name_bangla); ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo e($about->foundation_name_ab); ?>

                                <?php else: ?>
                                    <?php echo e($about->foundation_name); ?>

                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-5 wow fadeInLeft" style="margin-top: 100px;" data-wow-duration="1s"
                        data-wow-delay="0.3s">
                        <h2 class="text-uppercase mt-0">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($about->title_bangla); ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo e($about->title_ab); ?>

                            <?php else: ?>
                                <?php echo e($about->title); ?>

                            <?php endif; ?>
                        </h2>

                        <p>
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo $about->des_bangla; ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo $about->des_ab; ?>

                            <?php else: ?>
                                <?php echo $about->des_eng; ?>

                            <?php endif; ?>
                        </p>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Donation start -->
    <?php echo $__env->make('frontend.donation.donation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Section: Donation end -->

    <!-- Section: project start -->
    
    <!-- Section: project end  -->

    <!-- Section: project start -->
    <?php echo $__env->make('frontend.activities.activities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Section: project end  -->

    

    <!-- Section: Campaign -->
    

    <!-- Section: DonetForm & Testimonials -->
    

    <!-- Section: Upcoming Events -->
    <section class="bg-light">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                                class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>
                            <?php if(session()->get('language') == 'bangla'): ?>
                                দান/সহযোগীতা করুন
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                حملة التبرع
                            <?php else: ?>
                                Donation Campaign
                            <?php endif; ?>
                            </span>
                        </h3>
                        <div class="owl-carousel-2col">
                            <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item bg-white custom_card"
                                    style="height: 500px; margin: 20px; border-radius: 20px;">
                                    <div class="campaign maxwidth500 mb-30">
                                        <div class="thumb"
                                            style="height: 220px; border-top-right-radius: 20px; border-top-left-radius: 20px;">
                                            <img src="<?php echo e(asset($donation->image)); ?>" alt="" class="img-fullwidth">
                                            <div class="campaign-overlay"></div>
                                        </div>
                                        <div class="campaign-details clearfix p-15 pt-10 pb-10" style="height:250px">
                                            <h4 class="font-weight-700 mt-0"><a href="#"></a>
                                                <?php if(session()->get('language') == 'bangla'): ?>
                                                    <?php echo e($donation->bangla_title); ?>

                                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                                    <?php echo e($donation->arabic_title); ?>

                                                <?php else: ?>
                                                    <?php echo e($donation->title); ?>

                                                <?php endif; ?>
                                            </h4>
                                            <div style="width:100%;height:130px; overflow-y: scroll;">
                                                <p>
                                                    <?php if(session()->get('language') == 'bangla'): ?>
                                                        <?php echo $donation->short_des_bangla1; ?>

                                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                                        <?php echo $donation->short_des_ab1; ?>

                                                    <?php else: ?>
                                                        <?php echo $donation->short_des1; ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                            <div class="campaign-bottom clearfix mt-20 mb-10"
                                                style="text-align: center">
                                                <a class="btn_custom"
                                                    href="<?php echo e(route('donation', $donation->id)); ?>">
                                                    <?php if(session()->get('language') == 'bangla'): ?>
                                                        দান করুন
                                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                                        تبرع الآن
                                                    <?php else: ?>
                                                        Donate Now
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-lg-6 col-xl-6">
                        <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                                class="fa fa-calendar text-gray-darkgray mr-10"></i>
                            <?php if(session()->get('language') == 'bangla'): ?>
                                আসন্ন প্রকল্প
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                المشاريع القادمة
                            <?php else: ?>
                                Upcoming Projects
                            <?php endif; ?>
                            </span>
                        </h3>

                        <?php $__currentLoopData = $upcomingProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="post media-post clearfix pb-0 mb-15">
                                <div class="event-date-time pull-left flip bg-theme-colored text-center mt-5 p-15 pt-10">
                                    <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">22</h4>
                                    <span class="text-white">Sep</span>
                                </div>
                                <div class="post-right upcoming-event-right">
                                    <h4 class="mt-0 mb-5"><a
                                            href="<?php echo e(route('upcoming.project.details', $item->id)); ?>"><?php echo e($item->title); ?></a>
                                    </h4>
                                    <ul class="list-inline font-12 mb-5">
                                        <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                                        <li class="pl-5"><i class="fa fa-map-marker mr-5"></i><?php echo e($item->location); ?></li>
                                    </ul>
                                    <p class="mb-0 font-13"><?php echo $item->short_des1; ?></p>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Funfact -->

    <!-- Divider: Counters start-->
    <section class="divider parallax layer-overlay overlay-dark-4" data-bg-img="<?php echo e(asset('frontend/images/bg/bg2.jpg')); ?>"
        data-parallax-ratio="0.7">
        <div class="container pt-90 pb-90">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="<?php echo e($counter->incon_1); ?> mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="<?php echo e($counter->value_1); ?>"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($counter->title_bn1); ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo e($counter->title_ab1); ?>

                            <?php else: ?>
                                <?php echo e($counter->title_1); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="<?php echo e($counter->incon_2); ?> mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="<?php echo e($counter->value_2); ?>"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($counter->title_bn2); ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo e($counter->title_ab2); ?>

                            <?php else: ?>
                                <?php echo e($counter->title_2); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="<?php echo e($counter->incon_3); ?> mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="<?php echo e($counter->value_3); ?>"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($counter->title_bn3); ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo e($counter->title_ab3); ?>

                            <?php else: ?>
                                <?php echo e($counter->title_3); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="<?php echo e($counter->incon_4); ?> mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="<?php echo e($counter->value_4); ?>"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo e($counter->title_bn4); ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo e($counter->title_ab4); ?>

                            <?php else: ?>
                                <?php echo e($counter->title_4); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Divider: Counters start-->

    <!-- Section: video Gallery -->
    <?php echo $__env->make('frontend.gallery.video_gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Section: video Gallery -->

    <!-- Section: image Gallery -->
    <?php echo $__env->make('frontend.gallery.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Section: image Gallery -->

    <!-- Diver: Video Background  -->
    

    <!-- Section: blog -->
    

    <!-- Divider: Donors -->
    

    <!-- Divider: Donors -->
    <?php echo $__env->make('frontend.partners.partners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Divider: Donors -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_script'); ?>
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
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/home/home.blade.php ENDPATH**/ ?>