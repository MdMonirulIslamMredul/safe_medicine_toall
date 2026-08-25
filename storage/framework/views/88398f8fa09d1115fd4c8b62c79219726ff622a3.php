
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
                    <form action="<?php echo e(route('update.research')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($research->id); ?>" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Blogs Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="service_title" value="<?php echo e($research->title); ?>" placeholder="Blogs Title">
                        </div>
                        <div class="form-group">
                            <label>Blogs Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($research->main_image)); ?>" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Blogs Small Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="short_details"><?php echo $research->short_details; ?></textarea>
                        </div>

                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($research->banner_image)); ?>" class="mb-2" height="100" width="100" alt="">


                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($research->details_image1)); ?>" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($research->details_image2)); ?>" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Details Image Three</label>
                            <input type="file" name="details_image3" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($research->details_image3)); ?>" class="mb-2" height="100" width="100" alt="">




                        <div class="form-group">
                            <label>Blogs Long Details one</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details1"><?php echo $research->details1; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Blogs Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details2"><?php echo $research->details2; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" <?php if($research->add_home == 1): ?> selected <?php endif; ?>>Yes</option>
                                <option value="0" <?php if($research->add_home == 0): ?> selected <?php endif; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if($research->status == 1): ?> selected <?php endif; ?>>Active</option>
                                <option value="0" <?php if($research->status == 0): ?> selected <?php endif; ?>>Deactive</option>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\research\edit_research.blade.php ENDPATH**/ ?>