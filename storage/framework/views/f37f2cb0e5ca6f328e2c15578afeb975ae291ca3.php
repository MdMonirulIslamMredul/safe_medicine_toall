
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
                <form class="form-horizontal" action="<?php echo e(route('update.upcome.project')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" value="<?php echo e($edit_upcomeproject->id); ?>" name="id">
                    <input type="hidden" value="<?php echo e($edit_upcomeproject->image1); ?>" name="old_img1">
                    <input type="hidden" value="<?php echo e($edit_upcomeproject->image2); ?>" name="old_img2">
                    <input type="hidden" value="<?php echo e($edit_upcomeproject->image3); ?>" name="old_img3">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($edit_upcomeproject->title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" value="<?php echo e($edit_upcomeproject->bangla_title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Project Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo e($edit_upcomeproject->location); ?>" >
                    </div>
                    <div class="form-group">
                        <label>Project Strting Date</label>
                        <input type="date" name="project_start_date" class="form-control" value="<?php echo e($edit_upcomeproject->project_start_date); ?>" >
                    </div>
                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="file" name="image1" class="form-control">
                        <img src="<?php echo e(asset($edit_upcomeproject->image1)); ?>" alt="" style="height: 100px">
                    </div>
                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="file" name="image2" class="form-control">
                        <img src="<?php echo e(asset($edit_upcomeproject->image2)); ?>" alt="" style="height: 100px">
                    </div>
                    <div class="form-group">
                        <label>Image 3</label>
                        <input type="file" name="image3" class="form-control">
                        <img src="<?php echo e(asset($edit_upcomeproject->image3)); ?>" alt="" style="height: 100px">
                    </div>
                    <div class="form-group">
                        <label>Video 1</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link1" >
                            <?php echo $edit_upcomeproject->video_link1; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Video 2</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link2" >
                            <?php echo $edit_upcomeproject->video_link2; ?>

                        </textarea>
                    </div>
                    
                     <div class="form-group">
                        <label>Short Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des1" >
                            <?php echo $edit_upcomeproject->short_des1; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short  Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des2" >
                            <?php echo $edit_upcomeproject->short_des2; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla1" >
                            <?php echo $edit_upcomeproject->short_des_bangla1; ?>

                        </textarea>
                    </div>                    
                    <div class="form-group">
                        <label>Short Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla2" >
                            <?php echo $edit_upcomeproject->short_des_bangla2; ?>

                        </textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Long Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des1" >
                            <?php echo $edit_upcomeproject->long_des1; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des2" >
                            <?php echo $edit_upcomeproject->long_des2; ?>

                        </textarea>
                    </div>                    
                    <div class="form-group">
                        <label>Long Description-3 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des3" >
                            <?php echo $edit_upcomeproject->long_des3; ?>

                        </textarea>
                    </div>                    

                    <div class="form-group">
                        <label>Long Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla1" >
                            <?php echo $edit_upcomeproject->long_des_bangla1; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla2" >
                            <?php echo $edit_upcomeproject->long_des_bangla2; ?>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla3" >
                            <?php echo $edit_upcomeproject->long_des_bangla3; ?>

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

   
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\project\edit_upcome_project.blade.php ENDPATH**/ ?>