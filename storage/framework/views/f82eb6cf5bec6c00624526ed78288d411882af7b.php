
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="enroll_certificate_form" class="form-horizontal" action="<?php echo e(route('store.enrollment.certificate')); ?>" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="enroll_id" value="">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                
                <input type="file" class="form-control" name="enroll_certificate" id="enroll_certificate">
                
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">upload</button>
        </div>
        </form>
    </div>
    </div>
</div><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\enrollment\modal.blade.php ENDPATH**/ ?>