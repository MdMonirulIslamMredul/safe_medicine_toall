
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
                    <form class="form-horizontal" action="<?php echo e(route('store.enrollmetn.info')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php if($enrollment_info!=null): ?>
                        <input type="hidden" name="id" value="<?php echo e($enrollment_info->id); ?>">
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label>Institute Name</label>
                           
                                <input type="text" class="form-control" rows="5" name="institute_name" id="institute_name" value="<?php echo e($enrollment_info != null ? $enrollment_info->institute_name : ''); ?>" placeholder="Institute Name">
                            

                        </div>
                        <div class="form-group">
                            <label>Institute Address</label>
                            
                                <input type="text" class="form-control" rows="5" name="institute_address" id="institute_address" value="<?php echo e($enrollment_info != null ? $enrollment_info->institute_address : ''); ?>" placeholder="Institute Address">
                           
                        </div>
                        <div class="form-group">
                            <label>Institute Owner</label>
                           
                            <input type="text" name="institute_owner" class="form-control" value="<?php echo e($enrollment_info != null ? $enrollment_info->institute_owner : ''); ?>" placeholder="Institute Owner Name">
                           
                        </div>

                        <div class="form-group">
                            <label>Institutional Instructions</label>
                          
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="institute_Instructions">
                                <?php echo e($enrollment_info != null ? $enrollment_info->institute_Instructions : ''); ?>  
                            </textarea>
                            

                        </div>

                        <div class="table-responsive">     
                        <?php if($enrollment_info !=null): ?>
                            <button type="submit" class="btn btn-info">Update</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-info">Submit</button>
                        <?php endif; ?>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\enrollment\add_enrollment_info.blade.php ENDPATH**/ ?>