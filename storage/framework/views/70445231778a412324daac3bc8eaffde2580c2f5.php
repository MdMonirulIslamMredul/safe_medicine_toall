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
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-2 col-md-2">

                                <a href="<?php echo e(route('category.audio',$category->id)); ?>">
                                <div class="custom_card"
                                style="padding: 5px; border-radius: 20px; margin-bottom: 30px; text-align: center;">
                               <img src="<?php echo e(asset('images/'.$category->img)); ?>"
                                    class="img-responsive"
                                    style="height: 50px; border-top-right-radius: 20px; border-top-left-radius: 20px; display: inline-block;">


                                   <h4 class="text-center">
                                       <?php if(session()->get('language') == 'bangla'): ?>
                                           <?php echo e($category->category_name_ban); ?>


                                       <?php else: ?>
                                           <?php echo e($category->category_name); ?>

                                       <?php endif; ?>
                                   </h4>

                           </div>
                              </a>

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

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\audio\audio_page.blade.php ENDPATH**/ ?>