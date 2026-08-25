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

                <div class="card-body ">
                    <form class="form-horizontal" action="<?php echo e(route('store.about')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php if($about_data!=null): ?>
                        <input type="hidden" value="<?php echo e($about_data->id); ?>" name="id">
                        <?php endif; ?>

                        <h3>Front page information</h3>
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="About Title" required>
                        </div>
                        <div class="form-group">
                            <label>About Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title_bangla" placeholder="About Title Bangla" required>
                        </div>
                        
                        <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description English</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_eng" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Bangla</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="des_bangla" ></textarea>
                        </div>
                        
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset($about->image1)); ?>" style="height: 100px"></td>
                            <td><?php echo e($about->title ?? null); ?></td>
                            <td><?php echo $about->details1 ?? null; ?></td>

                            <td>
                                <a href="<?php echo e(route('edit.about',['id'=>$about->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\about\about.blade.php ENDPATH**/ ?>