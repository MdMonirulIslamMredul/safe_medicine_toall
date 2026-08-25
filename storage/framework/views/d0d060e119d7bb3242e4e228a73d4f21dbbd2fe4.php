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
                <form class="form-horizontal" action="<?php echo e(route('update.activities')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" value="<?php echo e($edit_activity->id); ?>" name="id">
                    <input type="hidden" value="<?php echo e($edit_activity->image); ?>" name="old_img">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($edit_activity->title); ?>">
                    </div>

                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" value="<?php echo e($edit_activity->bangla_title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Arabic Title</label>
                        <input type="text" name="arabic_title" class="form-control"  value="<?php echo e($edit_activity->arabic_title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image">
                    </div>
                    <div>
                       <img src="<?php echo e(asset($edit_activity->image)); ?>" alt="" style="height: 100px">
                    </div>

                    <div class="form-group">
                        <label>Description English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_eng">
                            <?php echo $edit_activity->short_des_eng; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Description Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla">
                            <?php echo $edit_activity->short_des_bangla; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Description Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_arabic" >
                            <?php echo $edit_activity->short_des_arabic; ?>

                        </textarea>
                    </div>

                    <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\activities\edit_activity.blade.php ENDPATH**/ ?>