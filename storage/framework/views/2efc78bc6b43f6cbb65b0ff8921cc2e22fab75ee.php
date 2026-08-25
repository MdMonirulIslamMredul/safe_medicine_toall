<?php $__env->startSection('title'); ?>
Audio
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_style'); ?>
<link rel="stylesheet" type="text/css"
    href="<?php echo e(asset('/')); ?>admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo e(asset('/')); ?>admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumbs End -->

<!-- Audio Section Start -->
<section id="blog">
    <div class="container pb-sm-30">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-uppercase line-bottom-center mt-0">
                        <?php if(session()->get('language') == 'bangla'): ?>
                        লেকচার অডিও
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                        أنشطتنا
                        <?php else: ?>
                        Lecture Audio
                        <?php endif; ?>
                    </h2>
                </div>
            </div>
        </div>


        <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-6">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $category->audios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-md-4">

                                <div class="custom_card" style="padding: 5px; border-radius: 20px; margin-bottom: 30px;">
                                    <img src="<?php echo e(asset('thumbnails/'.$audio->thumbnil_img )); ?>"
                                         class="img-responsive img-fullwidth"
                                         style="height: 200px; border-top-right-radius: 20px; border-top-left-radius: 20px;">

                                    <!-- Center the audio control -->
                                    <div class="text-center" style="margin-top: 20px;">
                                        <audio controls style="width: 220px;">
                                            <source src="<?php echo e(asset('audio_file/' . $audio->audio_file)); ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>

                                    <h4 class="text-center" style="margin-top: 10px;">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            <?php echo e($audio->title_bn); ?>

                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            <?php echo e($audio->title_ab); ?>

                                        <?php else: ?>
                                            <?php echo e($audio->title_en); ?>

                                        <?php endif; ?>
                                    </h4>
                                </div>


                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2>
                                <?php if(session()->get('language') == 'bangla'): ?>
                                পাওয়া যায়নি
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                لم يتم العثور على الكتاب
                                <?php else: ?>
                                No Aduio Found
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
                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('subcategory.audio', ['id' => $subcategory->id])); ?>">
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

    </div>
</section>





</div>

</div>
</div>
<!-- Audio Section End -->



<!-- Main content End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('frontend_script'); ?>
<script src="<?php echo e(asset('/')); ?>admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('/')); ?>admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>
    $(function () {
        // Initialize DataTable for #myTable (if exists)
        $('#myTable').DataTable();

        // Initialize DataTable for #example with options
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                            '</td></tr>');
                        last = group;
                    }
                });
            }
        });

        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });

        // Initialize DataTable for #dataTable with responsive option
        $('#dataTable').DataTable({
            responsive: true
        });
        // $('#dataTable2').DataTable({
        //     responsive: true
        // });

        // Initialize DataTable for #example23 with buttons
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        // Add button styling
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
            'btn btn-primary me-1');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\audio\category_audio.blade.php ENDPATH**/ ?>