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
                    <form class="form-horizontal" action="<?php echo e(route('store.blogs')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label> Title(EN)</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="Blogs Title">
                        </div>
                        <div class="form-group">
                            <label> Title(BN)</label>
                            <input type="text" class="form-control" rows="5" name="title_bn" id="title" placeholder="Blogs Title">
                        </div>
                        
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> short Details(EN)</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="short_details"></textarea>
                        </div>
                        <div class="form-group">
                            <label> short Details(BN)</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="short_details_bn"></textarea>
                        </div>
                        
                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Long Details one(EN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Long Details one(BN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details1_bn"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label> Long Details two(EN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details2"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Long Details two(BN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details2_bn"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>


                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($blog->title ?? null); ?></td>
                            <td><img src="<?php echo e(asset($blog->main_image)); ?>" style="height: 100px"></td>


                            <td>
                                <?php if($blog->status == 1): ?>
                                    <button class="btn btn-sm btn-primary">Active</button>
                                <?php elseif($blog->status == 0): ?>
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('edit.blogs',['id'=>$blog->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>

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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\blogs\blogs.blade.php ENDPATH**/ ?>