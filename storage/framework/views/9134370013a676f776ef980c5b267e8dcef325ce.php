
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
                <form class="form-horizontal" action="<?php echo e(route('update.partner')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($edit_partner->id); ?>" name="id">
                    <input type="hidden" value="<?php echo e($edit_partner->image); ?>" name="old_img">

                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="partner_name" class="form-control" value="<?php echo e($edit_partner->partner_name); ?>">
                    </div>
                    <div class="form-group">
                        <label>Partner Name Bangla</label>
                        <input type="text" name="partner_name_bangla" class="form-control" value="<?php echo e($edit_partner->partner_name_bangla); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>  
                    <div>
                        <img src="<?php echo e(asset($edit_partner->image)); ?>" alt="" style="height: 100px;">
                    </div>
                    <div class="form-group">
                        <label>Active/Deactive</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if($edit_partner->status == 1): ?> selected <?php endif; ?>>Active</option>
                            <option value="0" <?php if($edit_partner->status == 0): ?> selected <?php endif; ?>>Deactive</option>
                        </select>
                    </div>                
                   
                    <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\partner\edit_partner.blade.php ENDPATH**/ ?>