

<?php $__env->startPush('frontend_style'); ?>
    <style>
        .custom_card {
            padding: 40px;
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6"
        data-bg-img="<?php echo e(asset('frontend/images/bg/bg2.jpg')); ?>">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28 text-white">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                প্রবেশ করুন
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                تسجيل الدخول
                            <?php else: ?>
                                Login
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
                                        প্রবেশ করুন
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        تسجيل الدخول
                                    <?php else: ?>
                                        Login
                                    <?php endif; ?>
                                </li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- My Account Section Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3 custom_card">
                    <h2 class="text-gray mt-0 pt-5">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            প্রবেশ করুন
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            تسجيل الدخول
                        <?php else: ?>
                            Login
                        <?php endif; ?>
                    </h2>
                    <form method="POST" action="<?php echo e(route('login')); ?>" class="clearfix">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_username_email">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        ব্যবহারকারীর নাম/ইমেল
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        اسم المستخدم/البريد الإلكتروني
                                    <?php else: ?>
                                        Username/Email
                                    <?php endif; ?>
                                </label>
                                <input type="email" id="email" name="email"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> ব্যবহারকারীর নাম/ইমেল
                              <?php elseif(session()->get('language') == 'arabic'): ?>
اسم المستخدم/البريد الإلكتروني 
                              <?php else: ?> Username/Email <?php endif; ?>"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_password">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        পাসওয়ার্ড
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        كلمة المرور
                                    <?php else: ?>
                                        Password
                                    <?php endif; ?>
                                </label>
                                <input id="password" type="password"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> পাসওয়ার্ড <?php elseif(session()->get('language') == 'arabic'): ?> كلمة المرور <?php else: ?> password <?php endif; ?>"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn_custom">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                প্রবেশ করুন
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                تسجيل الدخول
                            <?php else: ?>
                                Login
                            <?php endif; ?>
                        </button>
                        <div class="last-password">
                          <?php if(session()->get('language') == 'bangla'): ?>
                          নিবন্ধিত নন? <a href="<?php echo e(route('register')); ?>">একটি অ্যাকাউন্ট তৈরি করুন</a>
                      <?php elseif(session()->get('language') == 'arabic'): ?>
                          لم تسجل بعد؟ <a href="<?php echo e(route('register')); ?>">أنشئ حسابًا</a>
                      <?php else: ?>
                          Not registered? <a href="<?php echo e(route('register')); ?>" style="color: #29b54e;">Create an account</a>
                      <?php endif; ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/auth/login.blade.php ENDPATH**/ ?>