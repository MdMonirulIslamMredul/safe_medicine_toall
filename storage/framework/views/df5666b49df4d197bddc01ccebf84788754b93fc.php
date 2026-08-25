<?php $__env->startSection('content'); ?>
    <style>
        .member-form {

            background-color: #F5F5F5;
            padding: 50px 40px;
            border-radius: 5px;
            border: 2px solid #F5F5F5
        }

        input[type=text] {
            border-radius: 3px;
        }
    </style>


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="<?php echo e(asset('frontend/images/bg/bg1.jpg')); ?>">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                সদস্যপদ
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                عضوية
                            <?php else: ?>
                                Membership
                            <?php endif; ?>
                        </h3>
                        <ul class="breadcrumb white">
                            <li><a href="<?php echo e(url('/')); ?>">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    হোম
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    بيت
                                <?php else: ?>
                                    Home
                                <?php endif; ?>
                            </a></li>
                            <li class="active">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    সদস্যপদ
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    عضوية
                                <?php else: ?>
                                    Membership
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Featured Campaign -->
    <section>

        <div class="container pb-30">
            <div class="section-content">
                <div class="row">
                    <div class="col-12 col-md-6" st>
                        <div class="card">
                            <?php echo $membership->video_link; ?>

                        </div>
                        <div class="card">
                            <h3 style="text-align: center">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo e($membership->title_bangla); ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo e($membership->title_ab); ?>

                                <?php else: ?>
                                    <?php echo e($membership->title); ?>

                                <?php endif; ?>
                            </h3>
                            <p>
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo $membership->long_des_bangla1; ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo $membership->long_des_ab1; ?>

                                <?php else: ?>
                                    <?php echo $membership->long_des_eng1; ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card" style="margin-left: 10px;backgorund-color:grey">
                            <h2 style="text-align: center">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    সদস্য কল
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    دعوة الأعضاء
                                <?php else: ?>
                                    Member Call
                                <?php endif; ?>
                            </h2>
                            <?php if(session()->get('language') == 'bangla'): ?>
                                <?php echo $membership->long_des_bangla2; ?>

                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                <?php echo $membership->long_des_ab2; ?>

                            <?php else: ?>
                                <?php echo $membership->long_des_eng2; ?>

                            <?php endif; ?>
                        </div>
                        <div class="card member-form">
                            <div class="" style="">
                                <h3 style="text-align: center">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        আবেদনপত্র
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        نموذج الطلب
                                    <?php else: ?>
                                        Applicatio Form
                                    <?php endif; ?>
                                </h3>
                                <form class="form-horizontal" action="<?php echo e(route('store.membership.form')); ?>"
                                    enctype="multipart/form-data" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="name">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                সদস্যের ধরন
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                نوع العضو
                                            <?php else: ?>
                                                Member Type
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" id="memter_type" name="memter_type"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> আজীবন সদস্য/দাতা সদস্য
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
عضو مدى الحياة / عضو دونر
                                            <?php else: ?> Life time member/Doner member <?php endif; ?>
                                            "
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                নাম
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                اسم
                                            <?php else: ?>
                                                Name
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> নাম
                                        <?php elseif(session()->get('language') == 'arabic'): ?>اسم
                                        <?php else: ?> Name <?php endif; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                বাবার নাম
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                اسم الاب
                                            <?php else: ?>
                                                Fathers Name
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" name="father_name" id="father_name"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> বাবার নাম
                                            <?php elseif(session()->get('language') == 'arabic'): ?>اسم الاب
                                            <?php else: ?> Fathers Name <?php endif; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                ফোন নম্বর
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                رقم التليفون
                                            <?php else: ?>
                                                Phone Number
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> ফোন নম্বর
                                        <?php elseif(session()->get('language') == 'arabic'): ?>رقم التليفون
                                        <?php else: ?> Phone Number <?php endif; ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="profession">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                পেশা
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                إشغال
                                            <?php else: ?>
                                                Occupation
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" name="profession" id="profession"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> পেশা
                                            <?php elseif(session()->get('language') == 'arabic'): ?>إشغال
                                            <?php else: ?> Occupation <?php endif; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_address">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                ইমেইল ঠিকানা
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                عنوان البريد الإلكتروني
                                            <?php else: ?>
                                                Email Address
                                            <?php endif; ?>
                                        </label>
                                        <input type="email" class="form-control" name="email_address" id="email_address"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> ইমেইল ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
عنوان البريد الإلكتروني
                                        <?php else: ?> Email Address <?php endif; ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_id_link">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                রেফারেন্স
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                مرجع
                                            <?php else: ?>
                                                Reference
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" id="reference" name="reference"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                ঠিকানা
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                عنوان
                                            <?php else: ?>
                                                Address
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?> জেলা/উপজেলা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> المنطقة/أوبازيلا         
                                        <?php else: ?> District/UpaZilla <?php endif; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method">
                                            <?php if(session()->get('language') == 'bangla'): ?>
                                                ডোনার পেমেন্ট পদ্ধতি
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                                طريقة دفع المتبرع
                                            <?php else: ?>
                                                Doner Payment Method
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" class="form-control" id="payment_method" name="payment_method"
                                            placeholder="<?php if(session()->get('language') == 'bangla'): ?>ডোনার পেমেন্ট পদ্ধতি
                                            <?php elseif(session()->get('language') == 'arabic'): ?>
طريقة دفع المتبرع
                                            <?php else: ?> Doner Payment Method
                                            <?php endif; ?>" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn_custom" style="width: 100%; border: none"><?php if(session()->get('language') == 'bangla'): ?>সাবমিট
                                            <?php elseif(session()->get('language') == 'arabic'): ?>  يُقدِّم         
                                            <?php else: ?> Submit
                                            <?php endif; ?></button>

                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\member\membership_page.blade.php ENDPATH**/ ?>