
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
                    <form class="form-horizontal" action="<?php echo e(route('store.services')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Course Title</label>
                            <input type="text" class="form-control" rows="5" name="service_title" id="service_title" placeholder="Service Title">
                        </div>
                        <div class="form-group">
                            <label>Course Price</label>
                            <input type="number" min="0" class="form-control" rows="5" name="price" id="service_title" placeholder="Service Price">
                        </div>
                        <div class="form-group">
                            <label>Course Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Course Small Details</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="service_details_small"></textarea>
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
                            <label>Course Long Details one</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="service_details1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Course Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="service_details2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Course Long Details three</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="service_details3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="service_home">
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
                        <th>Image</th>
                        <th>Title</th>

                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset($service->main_image)); ?>" style="height: 100px"></td>
                            <td><?php echo e($service->service_title ?? null); ?></td>

                            <td>
                                <?php if($service->status == 1): ?>
                                    <button class="btn btn-sm btn-primary">Active</button>
                                <?php elseif($service->status == 0): ?>
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('edit.services',['id'=>$service->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\service\service.blade.php ENDPATH**/ ?>