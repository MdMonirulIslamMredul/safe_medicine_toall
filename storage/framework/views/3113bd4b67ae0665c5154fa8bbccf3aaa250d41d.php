
<?php $__env->startSection('body'); ?>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">            

            <?php if(session('message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('message')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
            <?php endif; ?>
            
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('store.partner')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="partner_name" class="form-control" placeholder="Partner Name">
                    </div>
                    <div class="form-group">
                        <label>Partner Name Bangla</label>
                        <input type="text" name="partner_name_bangla" class="form-control" placeholder="Partner Name Bangla">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>                   
                   
                    <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>                          
                        <th>Active/Deactive</th>                     
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e($partner->image ?? null); ?>" style="height: 100px;"></td>
                            <td><?php echo e($partner->partner_name ?? null); ?></td>                            
                            <td>
                                    <?php if($partner->status == 1): ?>
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    <?php elseif($partner->status == 0): ?>
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    <?php endif; ?>
                                </td>
                            <td>
                                <a href="<?php echo e(route('edit.partner',['id'=>$partner->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\partner\add_partner.blade.php ENDPATH**/ ?>