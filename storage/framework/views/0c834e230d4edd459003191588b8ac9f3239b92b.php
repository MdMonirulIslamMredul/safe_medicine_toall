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
    <form class="form-horizontal" action="<?php echo e(route('store.counter')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <?php if($counter!=null): ?>
        <input type="hidden" name="id" value="<?php echo e($counter->id); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Counter Title 1</label>
            <input type="text" class="form-control" rows="5" name="title_1" id="title_1" value="<?php echo e($counter != null ? $counter->title_1 : ''); ?>" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 1 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn1" id="title_bn1" value="<?php echo e($counter != null ? $counter->title_bn1 : ''); ?>" placeholder="Counter Title">
        </div>
        
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_1" id="value_1" value="<?php echo e($counter != null ? $counter->value_1 : ''); ?>" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn1" id="value_bn1" value="<?php echo e($counter != null ? $counter->value_bn1 : ''); ?>" placeholder="Counter Value">
        </div>
        
        <div class="form-group">
            <label>Icon 1</label>
            <input type="text" class="form-control" rows="5" name="incon_1" id="incon_1" value="<?php echo e($counter != null ? $counter->incon_1 : ''); ?>" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 2</label>
            <input type="text" class="form-control" rows="5" name="title_2" id="title_2" value="<?php echo e($counter != null ? $counter->title_2 : ''); ?>" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 2 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn2" id="title_bn2" value="<?php echo e($counter != null ? $counter->title_bn2 : ''); ?>" placeholder="Counter Title">
        </div>
        
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_2" id="value_2" value="<?php echo e($counter != null ? $counter->value_2 : ''); ?>" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn2" id="value_bn2" value="<?php echo e($counter != null ? $counter->value_bn2 : ''); ?>" placeholder="Counter Value">
        </div>
        
        <div class="form-group">
            <label>Icon 2</label>
            <input type="text" class="form-control" rows="5" name="incon_2" id="incon_2" value="<?php echo e($counter != null ? $counter->incon_2 : ''); ?>" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 3</label>
            <input type="text" class="form-control" rows="5" name="title_3" id="title_3" value="<?php echo e($counter != null ? $counter->title_3 : ''); ?>" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 3 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn3" id="title_bn3" value="<?php echo e($counter != null ? $counter->title_bn3 : ''); ?>" placeholder="Counter Title">
        </div>
        
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_3" id="value_3" value="<?php echo e($counter != null ? $counter->value_3 : ''); ?>" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn3" id="value_bn3" value="<?php echo e($counter != null ? $counter->value_bn3 : ''); ?>" placeholder="Counter Value">
        </div>
        
        <div class="form-group">
            <label>Icon 3</label>
            <input type="text" class="form-control" rows="5" name="incon_3" id="incon_3" value="<?php echo e($counter != null ? $counter->incon_3 : ''); ?>" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 4</label>
            <input type="text" class="form-control" rows="5" name="title_4" id="title_4" value="<?php echo e($counter != null ? $counter->title_4 : ''); ?>" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 4 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn4" id="title_bn4" value="<?php echo e($counter != null ? $counter->title_bn4 : ''); ?>" placeholder="Counter Title">
        </div>
        
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_4" id="value_4" value="<?php echo e($counter != null ? $counter->value_4 : ''); ?>" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn4" id="value_bn4" value="<?php echo e($counter != null ? $counter->value_bn4 : ''); ?>" placeholder="Counter Value">
        </div>
        
        <div class="form-group">
            <label>Icon 4</label>
            <input type="text" class="form-control" rows="5" name="incon_4" id="incon_4" value="<?php echo e($counter != null ? $counter->incon_4 : ''); ?>" placeholder="Icon ">
        </div>

        <div class="table-responsive">
        <?php if($counter !=null): ?>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\counter\add_counter.blade.php ENDPATH**/ ?>