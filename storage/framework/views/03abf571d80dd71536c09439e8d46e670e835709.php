<?php $__env->startSection('title'); ?>
    Tv
<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_style'); ?>
<?php echo $__env->make('admin.common.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('tvs.update',$tv->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <h3>Tv Information</h3>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en">Title (EN)</label>
                                    <input type="text" name="title_en" value="<?php echo e($tv->title_en); ?>" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en')); ?>">
                                    <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_bn">Title (BN)</label>
                                    <input type="text" name="title_bn" value="<?php echo e($tv->title_bn); ?>" class="form-control <?php $__errorArgs = ['title_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_bn')); ?>">
                                    <?php $__errorArgs = ['title_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label> short Details(EN)</label>
                                <textarea   class="editor form-control" col="10" row="6" name="short_details_en"><?php echo e($tv->short_details_en); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label> short Details(BN)</label>
                                <textarea   class="editor form-control" col="10" row="5" name="short_details_bn"><?php echo e($tv->short_details_bn); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label> Details(EN)</label>
                                <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details_en"><?php echo e($tv->details_en); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label> Details(BN)</label>
                                <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details_bn"><?php echo e($tv->details_bn); ?></textarea>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Embed File</label>
                                    <textarea class="editor form-control" col="10" rows="3" name="embed_video"><?php echo e($tv->embed_video); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Video</label>
                                    <input type="file" class="form-control" name="file_upload">
                                    <?php if(isset($tv->file_upload)): ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo e(asset('file_upload/' . $tv->file_upload)); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     

<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
<?php echo $__env->make('admin.common.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    // For Create
        // To Get Subcategory Data
        const getTvSubcategory = (category_id, selected = null) => {
            axios.get(`${window.location.origin}/get-tvsubcategories/${category_id}`).then(res => {
                let subcategories = res.data
                let element = $('#subcategory_id')
                // let upazila_element = $('#upazila_id').empty().append(`<option>Select a Thana</option>`).attr(
                //     'disabled', 'disabled')
                element.removeAttr('disabled')
                element.empty()
                element.append(`<option>Select a District</option>`)
                subcategories.map((subcategory, index) => {
                    // console.log(subcategory)
                    element.append(
                        `<option value="${subcategory.id}" ${selected == subcategory.id ?'selected' : ''}>${subcategory.subcategory_name}</option>`
                    )
                })
            })
        }

        $('#category_id').on('change', function() {
            getTvSubcategory($(this).val())
        })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\tv\tv.blade.php ENDPATH**/ ?>