
<?php $__env->startSection('body'); ?>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">

                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('update.main.banner',['id'=>$banner->id])); ?>" enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <h3>Banner one</h3>
                            <div class="form-group">
                                <label>Title</label>
                                <textarea class="form-control" row="3" name="title"><?php echo e($banner->title); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title Bangla</label>
                                <textarea class="form-control" row="3" name="title_bn"><?php echo e($banner->title_bn); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title Arabic</label>
                                <textarea class="form-control" row="3" name="title_ab"><?php echo e($banner->title_ab); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Short Details</label>
                                <textarea class="form-control" row="3" name="short_details"><?php echo e($banner->short_details); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Short Details Bangla</label>
                                <textarea class="form-control" row="3" name="short_details_bn"><?php echo e($banner->short_details_bn); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Short Details Arabic</label>
                                <textarea class="form-control" row="3" name="short_details_ab"><?php echo e($banner->short_details_ab); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="<?php echo e(asset($banner->image)); ?>" class="mt-2" height="100" width="100" alt="">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/admin/general/general-pages/website_banner_edit.blade.php ENDPATH**/ ?>