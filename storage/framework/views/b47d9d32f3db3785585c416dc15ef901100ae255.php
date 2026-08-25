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
                <form class="form-horizontal" action="<?php echo e(route('update.banner.title',['id'=>$banner_title->id])); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" rows="5" value="<?php echo e($banner_title->title); ?>" name="title" id="name" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="<?php echo e(asset($banner_title->image)); ?>" height="100" width="400" alt="">
                    </div>
                    <div class="form-group">
                        <label>Select Page for the title and banner</label>
                        <select class="form-control" name="page">
                            <option value="" disabled selected>Select Page</option>
                            <option value="about" <?php echo e($banner_title->page == 'about'?'selected':''); ?>>About</option>
                            <option value="service" <?php echo e($banner_title->page == 'service'?'selected':''); ?>>service</option>
                            <option value="department" <?php echo e($banner_title->page == 'department'?'selected':''); ?>>department</option>
                            <option value="projects" <?php echo e($banner_title->page == 'projects'?'selected':''); ?>>projects</option>
                            <option value="gallery" <?php echo e($banner_title->page == 'gallery'?'selected':''); ?>>gallery</option>
                            <option value="volunteer" <?php echo e($banner_title->page == 'volunteer'?'selected':''); ?>>volunteer</option>
                            <option value="news" <?php echo e($banner_title->page == 'news'?'selected':''); ?>>news</option>
                            <option value="user" <?php echo e($banner_title->page == 'user'?'selected':''); ?>>user</option>
                            <option value="audio" <?php echo e($banner_title->page == 'audio'?'selected':''); ?>>audio</option>
                            <option value="book" <?php echo e($banner_title->page == 'book'?'selected':''); ?>>book</option>
                            <option value="live_tv" <?php echo e($banner_title->page == 'live_tv'?'selected':''); ?>>live_tv</option>
                            <option value="image_gallery" <?php echo e($banner_title->page == 'image_gallery'?'selected':''); ?>>image_gallery</option>
                            <option value="video_gallery" <?php echo e($banner_title->page == 'video_gallery'?'selected':''); ?>>video_gallery</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\general\general-pages\banner_title_edit.blade.php ENDPATH**/ ?>