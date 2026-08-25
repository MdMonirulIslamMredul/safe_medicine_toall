
<?php $__env->startSection('body'); ?>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <?php $menus = \App\Models\Menu::get() ?>
                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update.sub.menu')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                            <input type="hidden" name="id" value="<?php echo e($sub_menu->id); ?>">
                            
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e($sub_menu->title); ?>">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" value="<?php echo e($sub_menu->designation); ?>">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e($sub_menu->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>Menu</label>
                            <select name="menu_id"  class="form-control">
                                <option disabled>Select Menu</option>

                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($menu->id); ?>" <?php echo e($menu->id==$sub_menu->menu_id?'selected':''); ?>><?php echo e($menu->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <?php if($sub_menu!=null): ?>
                                <img src="<?php echo e(asset($sub_menu->image)); ?>" class="mt-2" width="200" height="200" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            <?php if($sub_menu!=null): ?>
                                <img src="<?php echo e(asset($sub_menu->banner_image)); ?>" class="mt-2" width="200" height="100" alt="">
                            <?php endif; ?>
                        </div>

                        
                        
                        



                        <div class="form-group">
                            <label> Details</label>
                            <?php if($sub_menu!=null): ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"><?php echo $sub_menu->details1; ?></textarea>
                            <?php else: ?>
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                            <?php endif; ?>
                        </div>
                        


                        
                        
                        
                        
                        
                        
                        
                        <div class="table-responsive">
                            <?php if($sub_menu!=null): ?>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\menu\edit_sub_menu.blade.php ENDPATH**/ ?>