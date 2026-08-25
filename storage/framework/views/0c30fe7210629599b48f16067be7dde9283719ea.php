<?php $__env->startSection('title'); ?>
    Enrollment
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="<?php echo e(asset($banner->image??null)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Course Enrollment</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Course Enrollment</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Single Start -->
        <div class="container my-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-striped border no-wrap">
                            <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>User Name</th>
                                <th>Roll No.</th>
                                
                                <th>Number</th>
                                
                                <th>Status</th>
                                <th>Invoice</th>
                                <th>Certificate</th>

                            </tr>
                            </thead>
                            <tbody>
                                
                            <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($enrollment->service->service_title ?? null); ?></td>
                                    <td><?php echo e($enrollment->user->name ?? null); ?></td>
                                    <td><?php echo e($enrollment->user->roll_no ?? null); ?></td>
                                    
                                    <td><?php echo e($enrollment->mobile ?? null); ?></td>
                                    
                                    <td>
                                        <?php if($enrollment->status == 1): ?>
                                            <button class="btn btn-sm btn-success">Approved</button>
                                        <?php elseif($enrollment->status == 0): ?>
                                            <button class="btn btn-sm btn-warning">Pending</button>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e(route('download.enrollment',['id'=>$enroll_data->id])); ?>" class="btn btn-info btn-sm"><i class="bi bi-arrow-down"></i>Download</a></td>
                                    <td><a href="<?php echo e(asset($enrollment->enroll_certificate)); ?>" class="btn btn-success btn-sm"><i class="bi bi-arrow-down"></i>Download</a></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\enrollment\enrollment_page.blade.php ENDPATH**/ ?>