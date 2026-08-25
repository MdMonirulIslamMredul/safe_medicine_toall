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
                    <form class="form-horizontal" action="<?php echo e(route('update.about')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="<?php echo e($about->id); ?>" name="id">

                        <h3>Front page information</h3>
                        
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" class="form-control" rows="5" name="title" value="<?php echo e($about->title); ?>" id="title" placeholder="Service Title">
                        </div>
                        <div class="form-group">
                            <label>About Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title_bangla" value="<?php echo e($about->title_bangla); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control">
                            <img src="<?php echo e(asset($about->image1)); ?>" class="mb-2" height="100" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                            <img src="<?php echo e(asset($about->image2)); ?>" class="mb-2" height="100" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            <img src="<?php echo e(asset($about->banner_image)); ?>" class="mb-2" height="100" width="100" alt="">
                        </div>

                        <div class="form-group">
                            <label> Description English</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_eng">
                                <?php echo $about->des_eng; ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label> Description Bangla</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_bangla" >
                                <?php echo $about->des_bangla; ?>

                            </textarea>
                        </div>
                        

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\about\edit_about.blade.php ENDPATH**/ ?>