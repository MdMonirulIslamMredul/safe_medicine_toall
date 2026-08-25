
<?php $__env->startPush('frontend_style'); ?>
    <style>
        .custom_card {
            padding: 40px;
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-6"
            data-bg-img="<?php echo e(asset('frontend/images/bg/bg2.jpg')); ?>">
            <div class="container pt-60 pb-60">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="font-28 text-white">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    নিবন্ধন
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    تسجيل
                                <?php else: ?>
                                    Register
                                <?php endif; ?>
                                </h2>
                                <ol class="breadcrumb text-center text-black mt-10">
                                    <li><a href="<?php echo e(url('/')); ?>">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                হোম
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                بيت
                                            <?php else: ?>
                                                Home
                                            <?php endif; ?>
                                        </a></li>
                                    <li class="active text-theme-colored">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            নিবন্ধন
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            تسجيل
                                        <?php else: ?>
                                            Register
                                        <?php endif; ?>
                                    </li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumbs End -->

        <!-- Register Section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3 custom_card">
                        <h2 class="text-gray mt-0 pt-5">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                নতুন অ্যাকাউন্ট তৈরি করুন
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                إنشاء حساب جديد
                            <?php else: ?>
                                Create New Account
                            <?php endif; ?>
                        </h2>
                        <form method="POST" action="<?php echo e(route('register')); ?>" class="clearfix">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 mb-25">
                                    <input id="name" type="text" name="name" class="form-control" type="text"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?> ব্যবহারকারীর নাম
                                    <?php elseif(session()->get('language') == 'arabic'): ?>اسم المستخدم
                                    <?php else: ?> Username <?php endif; ?>"
                                        required>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="email" type="email" name="email" class="form-control" type="text"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?> ইমেল
                                    <?php elseif(session()->get('language') == 'arabic'): ?>البريد الإلكتروني
                                    <?php else: ?> Email <?php endif; ?>"
                                        required>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="pwd" name="password" class="form-control"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?> পাসওয়ার্ড
                                    <?php elseif(session()->get('language') == 'arabic'): ?>كلمة المرور
                                    <?php else: ?> Password <?php endif; ?>"
                                        type="password">
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="pwd_2" class="form-control" name="password_confirmation"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?> পাসওয়ার্ড নিশ্চিত করুন
                                    <?php elseif(session()->get('language') == 'arabic'): ?>تأكيد كلمة المرور
                                    <?php else: ?> Confirm Password <?php endif; ?>"
                                        type="password">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn_custom"><span class="txt">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                নিবন্ধন করুন
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                سجل
                                            <?php else: ?>
                                                Sign Up
                                            <?php endif; ?>
                                        </span></button>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="users">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            ইতিমধ্যে একটি সদস্যপদ আছে?
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            لديك حساب بالفعل؟
                                        <?php else: ?>
                                            Already have an account?
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('login')); ?>" style="color: #29b54e;">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                লগইন করুন
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                تسجيل الدخول
                                            <?php else: ?>
                                                Sign In
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Section -->

    </div>
    <!-- Main content End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/auth/register.blade.php ENDPATH**/ ?>