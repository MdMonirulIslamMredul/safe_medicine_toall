<?php $__env->startSection('content'); ?>

<div class="container pb-100 pt-100">
    <div class="panel panel-default">
        <div class="panel-heading" style="background: #29B54E">
            <h1 class="panel-title text-center" style="color:#fff">Congratulation !! Your donation Done</h1>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Donation ID:</strong></td>
                        <td><?php echo e($info->donate_id); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tracking ID:</strong></td>
                        <td><?php echo e($info->tracking_id); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Amount:</strong></td>
                        <td><?php echo e($info->amount); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td><?php echo e($info->dname); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?php echo e($info->demail); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td><?php echo e($info->dphone); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Transaction ID:</strong></td>
                        <td><?php echo e($info->transaction_id); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Payment Type:</strong></td>
                        <td><?php echo e($info->payment_type); ?></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\donation\donate_success.blade.php ENDPATH**/ ?>