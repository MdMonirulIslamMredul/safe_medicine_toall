
<?php $__env->startSection('body'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Name</th>
                            <th>Roll No.</th>                           
                            <th>Number</th>                          
                            <th>Status</th>                            
                            <th>Upload</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($enrollment->service->service_title ?? null); ?></td>
                                <td><?php echo e($enrollment->user->name ?? null); ?></td>
                                <td><?php echo e($enrollment->user->roll_no ?? null); ?></td>                               
                                <td>
                                    <?php if($enrollment->personal_mobile): ?>
                                    <?php echo e($enrollment->personal_mobile ?? null); ?>

                                    <?php else: ?>
                                    <?php echo e($enrollment->guardian_mobile ?? null); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($enrollment->status == 1): ?>
                                        <button class="btn btn-sm btn-success">Paid</button>
                                    <?php elseif($enrollment->status == 0): ?>
                                        <button class="btn btn-sm btn-warning">Unpaid</button>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                      <button class="order-item-modal btn btn-primary"
                                        data-value="<?php echo e(json_encode($enrollment)); ?>">Upload Certificate</button>

                                   
                                    <?php echo $__env->make('admin.enrollment.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                               
                                  
                                </td>
                                <td>
                                <a href="<?php echo e(route('update.enrollment',['id'=>$enrollment->id])); ?>" class="btn btn-primary btn-sm editProduct">
                                    <?php echo e($enrollment->status == 1 ? 'Make Pending' : 'Approve'); ?></a>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Button trigger modal -->

  
  <!-- Modal -->

</div>
  <script>
     $(document).ready(function()
     {
        $("body")
        .on("click",".order-item-modal",function(){
            let itemValue = $(this).data("value");
            // console.log(itemValue.id);
            $("#enroll_id").val(itemValue.id);
            $("#exampleModal").modal("show");
        })
        .on('hidden.bs.modal',"#exampleModal", function () {
    $(this).find('form').trigger('reset');
})
});
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\enrollment\manage_enrollment.blade.php ENDPATH**/ ?>