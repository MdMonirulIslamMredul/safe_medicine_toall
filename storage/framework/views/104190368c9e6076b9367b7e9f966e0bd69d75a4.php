<?php $__env->startSection('body'); ?>

<div class="conatiner">
    <div class="card">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-striped border">
                            <thead>
                            <tr>

                                <th>name</th>
                                <th>Gmail</th>
                                <th>number</th>
                                <th>Amount</th>
                                <th>Payment_type</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($payment->dname); ?></td>
                                    <td><?php echo e($payment->demail); ?></td>
                                    <td><?php echo e($payment->dphone); ?></td>
                                    <td><?php echo e($payment->amount); ?></td>
                                    <td><?php echo e($payment->payment_type); ?></td>
                                    <td><?php echo e($payment->created_at); ?></td>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\donation\donation_payment.blade.php ENDPATH**/ ?>