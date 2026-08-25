
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
                    <form class="form-horizontal" action="<?php echo e(route('store.uploaded.result')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                       
                                            

                        <div class="form-group">
                            <label>Student Name</label>
                           <select name="user_id"  class="form-control">
                               <option value="" disabled>Select Name</option>
                               <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           </select>
                        </div>
                        

                        <div class="form-group">
                            <label>Result Grade</label>
                            <input type="text" class="form-control" rows="5" name="result_grade" id="result_grate" placeholder="Grade/A+,A..." required>
                            <input type="hidden" class="form-control" rows="5" name="result_type_id" value=<?php echo e($result_types->id); ?>>
                            <input type="hidden" class="form-control" rows="5" name="subject_id" value=<?php echo e($result_types->subject->id); ?>>
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
            <h2 class="text-center py-3"><?php echo e($result_types->subject->subject_name_english); ?> Results</h2>
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Sl</th>                           
                            <th>Student Name</th>
                            <th>Student Roll</th>                           
                            <th>Grade</th>                           
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $uploaded_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uploaded_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($uploaded_result->id); ?></td>                                
                                 <td><?php echo e($uploaded_result->user->name ?? null); ?></td>
                                <td><?php echo e($uploaded_result->user->roll_no ?? null); ?></td>                               
                                <td><?php echo e($uploaded_result->result_grate ?? null); ?></td>                               
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\result\upload_result.blade.php ENDPATH**/ ?>