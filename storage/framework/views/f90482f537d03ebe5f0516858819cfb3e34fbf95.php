
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
                    <form class="form-horizontal" action="<?php echo e(route('store.consultancy')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if($consultancy!=null): ?>
                            <input type="hidden" name="id" value="<?php echo e($consultancy->id); ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            <?php if($consultancy!=null): ?>
                                <img src="<?php echo e(asset($consultancy->banner_image)); ?>" class="mt-2" width="200" height="100" alt="">
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                            <?php if($consultancy!=null): ?>
                                <img src="<?php echo e(asset($consultancy->details_image1)); ?>" class="mt-2" width="100" height="100" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                            <?php if($consultancy!=null): ?>
                                <img src="<?php echo e(asset($consultancy->details_image2)); ?>" class="mt-2" width="100" height="100" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                            <?php if($consultancy!=null): ?>
                                <img src="<?php echo e(asset($consultancy->details_image3)); ?>" class="mt-2" width="100" height="100" alt="">
                            <?php endif; ?>
                        </div>



                        <div class="form-group">
                            <label>Blog Long Details one</label>
                            <?php if($consultancy!=null): ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"><?php echo $consultancy->details1; ?></textarea>
                            <?php else: ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Blog Long Details two</label>
                            <?php if($consultancy!=null): ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2"><?php echo $consultancy->details2; ?></textarea>
                            <?php else: ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2"></textarea>
                            <?php endif; ?>
                        </div>









                        <div class="table-responsive">
                            <?php if($consultancy!=null): ?>
                                <button type="submit" class="btn btn-info">Update</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-info">Submit</button>
                            <?php endif; ?>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\consultancy\consultancy.blade.php ENDPATH**/ ?>