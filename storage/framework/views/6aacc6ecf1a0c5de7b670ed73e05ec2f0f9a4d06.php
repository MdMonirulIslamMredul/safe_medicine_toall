<?php $__env->startSection('title'); ?>
    Profile Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="<?php echo e(asset($banner->image??null)); ?>" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Profile Settings</h1>
                <ul>
                    <li>
                        <a class="active" href="<?php echo e(route('front.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>
                    </li>
                    <li>Profile Settings</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Single Start -->
        <div class="container my-5">
            <div class="row mt-2">
                <div class="col-lg-12 ">
                    <div class="card mt-3">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="text-center"><?php if(session()->get('language')=='bangla'): ?> তথ্য নবায়ন করুন <?php else: ?> Update Information <?php endif; ?> </h3>
                            <form class="form-horizontal" action="<?php echo e(route('user.update.profile')); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" rows="5" name="name" value="<?php echo e($user->name); ?>" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" rows="5" name="email" value="<?php echo e($user->email); ?>" id="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="text" class="form-control" rows="5" name="new_password" id="youtube" placeholder="new password">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"  class="form-control">
                                    <img src="<?php echo e($user->image??null); ?>" class="my-4" height="100" width="100" alt="">
                                </div>
                                <div class="table-responsive">
                                    <button type="submit" class="btn btn-info"><?php if(session()->get('language')=='bangla'): ?> নবায়ন করুন <?php else: ?> Update <?php endif; ?> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\profile\profile.blade.php ENDPATH**/ ?>