<?php $__env->startSection('body'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                <tr>
                    <th>Email</th>

                    <th>Active/Deactive</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $subscribes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscribe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($subscribe->email ?? null); ?></td>

                        <td>
                            <?php if($subscribe->status == 1): ?>
                                <button class="btn btn-sm btn-primary">Active</button>
                            <?php elseif($subscribe->status == 0): ?>
                                <button class="btn btn-sm btn-danger">Deactive</button>
                            <?php endif; ?>
                        </td>
                        <td>
                            

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\subscribe\subscribe.blade.php ENDPATH**/ ?>