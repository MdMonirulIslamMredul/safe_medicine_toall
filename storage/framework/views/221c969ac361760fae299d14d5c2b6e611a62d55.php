
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
                    <form class="form-horizontal" action="<?php echo e(route('store.subject')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Subject Name Engilsh</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_english" id="subject_name_english" placeholder="Subject" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Subject Name Bangla</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_bangla" id="subject_name_bangla" placeholder="বিষয়" autocomplete="off" required>
                        </div> 
                        <input type="hidden" class="form-control" rows="5" name="result_id" value="<?php echo e($results->id); ?>" id="result_id" >                     
                       
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
                            <th>Sl</th>
                            <th>Subject</th>                           
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($subject->subject_name_english ?? null); ?></td>
                               
                                <td>
                                    <a href="<?php echo e(route('edit.subject',['id'=>$subject->id])); ?>" class="btn btn-primary btn-sm editProduct">Edit</a>

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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\result\add_subject.blade.php ENDPATH**/ ?>