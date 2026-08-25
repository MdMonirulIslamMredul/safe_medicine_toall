
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
                
                <div class="card-body ">
                    <form class="form-horizontal" action="<?php echo e(route('store.member')); ?>" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php if($member!=null): ?>
                        <input type="hidden" value="<?php echo e($member->id); ?>" name="id">
                        <?php endif; ?>

                        <h3>Front page information</h3>                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="Title English" value="<?php echo e($member != null ? $member->title : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Title Bangla</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title_bangla" value="<?php echo e($member != null ? $member->title_bangla : ''); ?>" placeholder="Title Bangla">
                        </div>
                        <div class="form-group">
                            <label>Title Arabic</label>
                            <input type="text" class="form-control" rows="5" name="title_ab" id="title_ab" value="<?php echo e($member != null ? $member->title_ab : ''); ?>" placeholder="Title Arabic">
                        </div>
                    
                        <div class="form-group">
                            <label>Details English 1</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_eng1">
                                <?php echo $member != null ? $member->long_des_eng1 : ''; ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Details English 2</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_eng2" >
                                <?php echo $member != null ? $member->long_des_eng2 : ''; ?>

                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Details Bangla 1</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_bangla1" >
                                <?php echo $member != null ? $member->long_des_bangla1 : ''; ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Details Bangla 2</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_bangla2" >
                                <?php echo $member != null ? $member->long_des_bangla2 : ''; ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Details Arabic 1</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_ab1" >
                                <?php echo $member != null ? $member->long_des_ab1 : ''; ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Details Arabic 2</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="long_des_ab2" >
                                <?php echo $member != null ? $member->long_des_ab2 : ''; ?>

                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>video</label>
                            <input type="text" class="form-control" rows="5" name="video_link" id="video_link" value="<?php echo e($member != null ? $member->video_link : ''); ?>" placeholder="Video Link">
                        </div>                        
                        
                        <div class="table-responsive">     
                            <?php if($member !=null): ?>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                       
                        <th>Title</th>
                        <th>Bangla</th>
                        <th>Video</th>                        
                    </tr>
                    </thead>
                    <tbody>
                   
                        <tr>
                           <td><?php echo e($member->title ?? null); ?></td>
                            <td><?php echo e($member->title_bangla ?? null); ?></td>


                            <td>
                                <?php echo $member->video_link; ?>


                            </td>
                        </tr>
                    

                    </tbody>

                </table>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\member\add_member.blade.php ENDPATH**/ ?>