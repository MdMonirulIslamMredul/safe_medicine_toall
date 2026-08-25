
<?php $__env->startSection('body'); ?>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update.gallery')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="<?php echo e($gallery->id); ?>" name="id">
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="<?php echo e(asset($gallery->image)); ?>" width="100" height="100" alt="">
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" <?php echo e($gallery->add_home==1?'selected':''); ?>>Yes</option>
                                <option value="0" <?php echo e($gallery->add_home==0?'selected':''); ?>>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if($gallery->status == 1): ?> selected <?php endif; ?>>Active</option>
                                <option value="0" <?php if($gallery->status == 0): ?> selected <?php endif; ?>>Deactive</option>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\gallery\edit_gallery.blade.php ENDPATH**/ ?>