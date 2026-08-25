
<?php $__env->startSection('body'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Name</th>                          
                        <th>Phone</th>                          
                        <th>Email</th>                          
                        <th>Occupation</th>                          
                        <th>Permanent District</th>                          
                        <th>Present District</th>                         
                 
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $volunteers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volunteer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($volunteer->name ?? null); ?></td>
                            <td><?php echo e($volunteer->phone_number?? null); ?></td>
                            <td><?php echo e($volunteer->email_address ?? null); ?></td>
                            <td><?php echo e($volunteer->profession ?? null); ?></td>
                            <td><?php echo e($volunteer->permanent_discrict ?? null); ?></td>
                            <td><?php echo e($partner->present_discrict ?? null); ?></td>                            
                           
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
   
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\volunteer\volunteer_list.blade.php ENDPATH**/ ?>