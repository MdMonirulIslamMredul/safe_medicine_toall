<?php $__env->startSection('title'); ?>
    Blogs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="<?php echo e(asset($banner->image)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Results</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Show Result</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
<h3 class="text-center"><?php if(session()->get('language') == 'bangla'): ?> <?php echo e($result_types->subject->subject_name_bangla ?? null); ?> <?php else: ?> <?php echo e($result_types->subject->subject_name_english ?? null); ?> <?php endif; ?> <?php if(session()->get('language')=='bangla'): ?> সকল ফলাফল <?php else: ?> All Results <?php endif; ?> </h3>
                <div class="card" style="background-color: #fff;
                padding: 1.5em;
                box-shadow: 3px 3px 20px rgba(0,0,0,.3);
                border-radius: 7px;
            ">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap" >
                                <thead>

                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Roll No.</th>
                                    <th scope="col">Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $uploaded_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $uploaded_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="">
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($uploaded_result->user->name ?? null); ?></td>
                                        <td><?php echo e($uploaded_result->user->roll_no ?? null); ?></td>
                                        <td><?php echo e($uploaded_result->result_grate ?? null); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\result\show_result.blade.php ENDPATH**/ ?>