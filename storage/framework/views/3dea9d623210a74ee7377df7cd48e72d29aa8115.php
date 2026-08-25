
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
                    <form action="<?php echo e(route('update.team')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($team->id); ?>" name="id">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="<?php echo e($team->name); ?>" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" rows="5" name="designation" value="<?php echo e($team->designation); ?>" id="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" rows="5" name="email" value="<?php echo e($team->email); ?>" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" rows="5" name="facebook" value="<?php echo e($team->facebook); ?>" id="facebook" placeholder="Facebook">
                        </div>
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" class="form-control" rows="5" name="instagram" value="<?php echo e($team->instagram); ?>" id="instagram" placeholder="Instagram">
                        </div>
                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="text" class="form-control" rows="5" name="linkedIn" value="<?php echo e($team->linkedIn); ?>" id="linkedIn" placeholder="LinkedIn">
                        </div>
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" class="form-control" rows="5" name="youtube" value="<?php echo e($team->youtube); ?>" id="youtube" placeholder="Youtube">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($team->image)); ?>" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" <?php if($team->add_home == 1): ?> selected <?php endif; ?>>Yes</option>
                                <option value="0" <?php if($team->add_home == 0): ?> selected <?php endif; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if($team->status == 1): ?> selected <?php endif; ?>>Active</option>
                                <option value="0" <?php if($team->status == 0): ?> selected <?php endif; ?>>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\team\edit_team.blade.php ENDPATH**/ ?>