
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <?php if(session('message')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('store.numbers')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if($number!=null): ?>
                        <input type="hidden" name="id" value="<?php echo e($number->id); ?>">
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Bkash Number</label>
                        <?php if($number!=null): ?>
                            <input type="text" class="form-control" rows="5" value="<?php echo e($number->bkash); ?>" name="bkash" id="name" placeholder="Bkash">
                        <?php else: ?>
                            <input type="text" class="form-control" rows="5" name="bkash" id="name" placeholder="Bkash">
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Nagad Number</label>
                        <?php if($number!=null): ?>
                            <input type="text" class="form-control" rows="5" value="<?php echo e($number->nagad); ?>" name="nagad" id="name" placeholder="Nagad">
                        <?php else: ?>
                            <input type="text" class="form-control" rows="5" name="nagad" id="name" placeholder="Nagad">
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Rocket Number</label>
                        <?php if($number!=null): ?>
                            <input type="text" class="form-control" rows="5" value="<?php echo e($number->rocket); ?>" name="rocket" id="name" placeholder="Rocket">
                        <?php else: ?>
                            <input type="text" class="form-control" rows="5" name="rocket" id="name" placeholder="Rocket">
                        <?php endif; ?>
                    </div>


                    <div class="table-responsive">

                        <?php if($number!=null): ?>
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

<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\general\general-pages\payment_number.blade.php ENDPATH**/ ?>