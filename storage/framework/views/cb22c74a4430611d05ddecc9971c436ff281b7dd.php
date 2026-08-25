
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
                    <form action="<?php echo e(route('update.testimonial')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($testimonial->id); ?>" name="id">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="<?php echo e($testimonial->name); ?>" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" rows="5" name="designation" value="<?php echo e($testimonial->designation); ?>" id="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Star</label>
                            <select class="form-control" name="star">
                                <option selected disabled>select review..</option>
                                <option value="0" <?php echo e($testimonial->star == 0?'selected':''); ?>>0</option>
                                <option value="1" <?php echo e($testimonial->star == 1?'selected':''); ?>>1</option>
                                <option value="2" <?php echo e($testimonial->star == 2?'selected':''); ?>>2</option>
                                <option value="3" <?php echo e($testimonial->star == 3?'selected':''); ?>>3</option>
                                <option value="4" <?php echo e($testimonial->star == 4?'selected':''); ?>>4</option>
                                <option value="5" <?php echo e($testimonial->star == 5?'selected':''); ?>>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="review"><?php echo e($testimonial->review); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($testimonial->image)); ?>" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" <?php if($testimonial->add_home == 1): ?> selected <?php endif; ?>>Yes</option>
                                <option value="0" <?php if($testimonial->add_home == 0): ?> selected <?php endif; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if($testimonial->status == 1): ?> selected <?php endif; ?>>Active</option>
                                <option value="0" <?php if($testimonial->status == 0): ?> selected <?php endif; ?>>Deactive</option>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\testimonial\edit_testimonial.blade.php ENDPATH**/ ?>