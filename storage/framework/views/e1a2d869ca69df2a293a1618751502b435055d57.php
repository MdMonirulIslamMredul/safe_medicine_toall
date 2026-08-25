<?php $__env->startSection('title'); ?>
    <?php if(session()->get('language') == 'bangla'): ?>
        বই
    <?php elseif(session()->get('language') == 'arabic'): ?>
        كتاب
    <?php else: ?>
        Book
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
            height: 450px;
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
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-6">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-md-6">
                                <a href="<?php echo e(route('book.details', ['id' => $book->id])); ?>">
                                    <div class="custom_card"
                                        style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                                        <img src="<?php echo e(asset('book_image')); ?>/<?php echo e($book->book_image); ?>" class="img-fluid">
                                        <h4>
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                <?php echo e($book->title_bn); ?>

                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                <?php echo e($book->title_ab); ?>

                                            <?php else: ?>
                                                <?php echo e($book->title_en); ?>

                                            <?php endif; ?>
                                        </h4>
                                        <div class="text-center">
                                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 flip mt-10"
                                                href="<?php echo e(route('book.details', ['id' => $book->id])); ?>">
                                                <?php if(session()->get('language') == 'bangla'): ?>
                                                    বিস্তারিত দেখুন
                                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                                    عرض التفاصيل
                                                <?php else: ?>
                                                    View Details
                                                <?php endif; ?>
                                            </a>
                                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 flip mt-10"
                                                href="<?php echo e(asset('pdf_file')); ?>/<?php echo e($book->pdf_file); ?>"><i
                                                    class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 15px"></i>
                                                <?php if(session()->get('language') == 'bangla'): ?>
                                                    ডাউনলোড করুন
                                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                                    تحميل
                                                <?php else: ?>
                                                    Download
                                                <?php endif; ?>
                                            </a>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2>
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    কোন বই পাওয়া যায়নি
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    لم يتم العثور على الكتاب
                                <?php else: ?>
                                    No Book Found
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                    </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="custom_card" style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                        <h2 style="margin-bottom: 15px">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                বিভাগ দ্বারা খুঁজুন
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                ابحث عن الفئة ب
                            <?php else: ?>
                                Find By Category
                            <?php endif; ?>
                        </h2>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="dropdown" style="margin: 2px 0">
                                <button class="btn btn-success dropdown-toggle" style="width: 100%; text-align: left"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        <?php echo e($category->category_name_ban); ?>

                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        <?php echo e($category->category_name_ab); ?>

                                    <?php else: ?>
                                        <?php echo e($category->category_name); ?>

                                    <?php endif; ?>
                                    <span class="caret pull-right" style="margin-top:7px"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <?php $__currentLoopData = $category->bookSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('subcategory.book', ['id' => $subcategory->id])); ?>">
                                                <?php if(session()->get('language') == 'bangla'): ?>
                                                    <?php echo e($subcategory->subcategory_name_ban); ?>

                                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                                    <?php echo e($subcategory->subcategory_name_ab); ?>

                                                <?php else: ?>
                                                    <?php echo e($subcategory->subcategory_name); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Audio Section End -->


    
    <!-- Main content End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\book\book_page.blade.php ENDPATH**/ ?>