
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
                    <form class="form-horizontal" action="<?php echo e(route('store.result')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php if($results != null): ?>
                        <input type="hidden" name="id" value="<?php echo e($results->id); ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Title</label>                            
                            <input type="text" class="form-control" rows="5" name="title" id="name"  value="<?php echo e($results !=null ? $results->title : ''); ?>" placeholder="Title">
                        </div>
                        <div class="table-responsive">
                            <?php if($results !=null): ?>
                            <button type="submit" class="btn btn-info">Update</button>
                            <?php else: ?>
                            <button type="submit" class="btn btn-info">submit</button>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\result\add_result.blade.php ENDPATH**/ ?>