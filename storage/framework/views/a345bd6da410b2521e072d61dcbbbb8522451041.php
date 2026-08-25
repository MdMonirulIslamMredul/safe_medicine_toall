
<?php $__env->startSection('title'); ?>
    Management
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row mt-2">
        <div class="col-lg-12 ">
            <div class="card mt-3">
                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <h3 class="text-center">Update Information</h3>
                    <form class="form-horizontal" action="<?php echo e(route('update.profile')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="<?php echo e($user->name); ?>" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" rows="5" name="email" value="<?php echo e($user->email); ?>" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="text" class="form-control" rows="5" name="new_password" id="youtube" placeholder="new password">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image"  class="form-control">
                            <img src="<?php echo e($user->image??null); ?>" height="100" width="100" alt="">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\profile\profile.blade.php ENDPATH**/ ?>