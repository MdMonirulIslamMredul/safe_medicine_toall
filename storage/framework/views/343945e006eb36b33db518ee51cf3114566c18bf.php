
    

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>

                        <th>Page</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $banner_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($data->title ?? null); ?></td>
                            <td><img src="<?php echo e(asset($data->image)); ?>" style="height: 100px;width: 200px"></td>

                            <td><?php echo e($data->page ?? null); ?></td>
                            <td>
                                <a href="<?php echo e(route('edit.banner.title',['id'=>$data->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>
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

<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\general\general-pages\banner_title.blade.php ENDPATH**/ ?>