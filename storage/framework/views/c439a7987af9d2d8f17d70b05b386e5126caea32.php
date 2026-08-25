<?php $__env->startPush('frontend_style'); ?>
    <style>
        .custom_card {
            padding: 40px;
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    Projects
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="pt-10 pb-10" style="text-align:center;background-color:#008E48;padding:0 5px;color:white;">
            <?php if(session()->get('language') == 'bangla'): ?>
                স্বেচ্ছাসেবক নিবন্ধন ফর্ম
            <?php elseif(session()->get('language') == 'arabic'): ?>
                نموذج تسجيل المتطوعين
            <?php else: ?>
                Volunteer Registration Form
            <?php endif; ?>
        </h2>

     

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('store.volunteer.data')); ?>" enctype="multipart/form-data"
                        class="custom_card">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            নাম
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            اسم
                                        <?php else: ?>
                                            Name
                                        <?php endif; ?>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>নাম <?php elseif(session()->get('language') == 'arabic'): ?> اسم<?php else: ?> Name <?php endif; ?>" required>
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
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>ফোন নম্বর <?php elseif(session()->get('language') == 'arabic'): ?> رقم التليفون<?php else: ?> Phone Number <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        জরুরী ফোন নম্বর
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                        رقم هاتف الطوارئ
                                        <?php else: ?>
                                        Emergency Phone Number
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" id="emergency_phone_number"
                                        name="emergency_phone_number" placeholder="<?php if(session()->get('language') == 'bangla'): ?>জরুরী ফোন নম্বর <?php elseif(session()->get('language') == 'arabic'): ?> رقم هاتف الطوارئ <?php else: ?> Emergency Phone Number <?php endif; ?>">
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
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>ইমেইল ঠিকানা <?php elseif(session()->get('language') == 'arabic'): ?> عنوان البريد الإلكتروني <?php else: ?> Email Address <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="facebook_id_link">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        ফেসবুক আইডি লিংক
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                        رابط معرف الفيسبوك
                                        <?php else: ?>
                                        Facebook ID Link
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" id="facebook_id_link" name="facebook_id_link"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>ফেসবুক আইডি লিংক <?php elseif(session()->get('language') == 'arabic'): ?> رابط معرف الفيسبوك <?php else: ?> Facebook ID Link <?php endif; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        এনআইডি নম্বর
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                        رقم الهوية الوطنية
                                        <?php else: ?>
                                        NID Number
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" name="nid_number" id="nid_number"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>এনআইডি নম্বর <?php elseif(session()->get('language') == 'arabic'): ?> رقم الهوية الوطنية <?php else: ?> NID Number <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="education_qualifiction">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        শিক্ষাগত যোগ্যতা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                        المؤهل العلمي
                                        <?php else: ?>
                                        Educational Qualification
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" id="education_qualifiction"
                                        name="education_qualifiction" placeholder="<?php if(session()->get('language') == 'bangla'): ?>শিক্ষাগত যোগ্যতা <?php elseif(session()->get('language') == 'arabic'): ?> المؤهل العلمي <?php else: ?> Educational Qualification <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="profession">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        পেশা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>مهنة
                                        <?php else: ?>
                                        Profession
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" name="profession" id="profession"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>পেশা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>مهنة
                                        <?php else: ?> Profession
                                        <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="institute_name">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        প্রতিষ্ঠানের নাম
                                        <?php elseif(session()->get('language') == 'arabic'): ?>اسم المعهد
                                        <?php else: ?>
                                        Institute Name
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" name="institute_name" id="institute_name"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>প্রতিষ্ঠানের নাম
                                        <?php elseif(session()->get('language') == 'arabic'): ?>اسم المعهد
                                        <?php else: ?> Institute Name
                                        <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteer_sector">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        সারসংক্ষেপ
                                        <?php elseif(session()->get('language') == 'arabic'): ?> ملخص
                                        <?php else: ?>
                                        Summary
                                        <?php endif; ?>
                                        </label>
                                    <textarea class="form-control" name="summery" id="summery" cols="30" rows="5"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>আপনার নিজের কথা লিখুন <?php elseif(session()->get('language') == 'arabic'): ?> اكتب كلماتك الخاصة <?php else: ?> Write your own words <?php endif; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="volunteer_sector">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        জন্য স্বেচ্ছাসেবক
                                        <?php elseif(session()->get('language') == 'arabic'): ?> متطوع ل
                                        <?php else: ?>
                                        Volunteer For
                                        <?php endif; ?>
                                        </label>
                                    <textarea class="form-control" name="volunteer_section" id="volunteer_section" cols="30" rows="5"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>রান্না করা, শেখানো, উদ্ধার করা <?php elseif(session()->get('language') == 'arabic'): ?> الطبخ،التدريس،الإنقاذ <?php else: ?> Cooking,Teach,Rescuing <?php endif; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="skill">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        বিশেষ দক্ষতা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> مهارة خاصة
                                        <?php else: ?>
                                        Special Skill
                                        <?php endif; ?>
                                        </label>
                                    <textarea class="form-control" name="skill" id="skill" cols="30" rows="5"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>অ্যাকাউন্টিং, চিকিৎসা, চিকিৎসা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> المحاسبة،الطب،العلاج
                                        <?php else: ?> Accounting,Medical,Treatment
                                        <?php endif; ?>"></textarea>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        স্থায়ী ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> العنوان الثابت
                                        <?php else: ?>
                                        Permanent Address
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" name="permanent_discrict"
                                        id="permanent_discrict" placeholder="<?php if(session()->get('language') == 'bangla'): ?>জেলা/উপজেলা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> المنطقة/أوبازيلا
                                        <?php else: ?> District/UpaZilla
                                        <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>  عنوان
                                        <?php else: ?>
                                        Address
                                        <?php endif; ?>
                                        </label>
                                    <textarea class="form-control" name="permanent_tikana" id="permanent_tikana" cols="30" rows="5"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>  عنوان
                                        <?php else: ?> Address
                                        <?php endif; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                        বর্তমান ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> العنوان الحالي
                                        <?php else: ?>
                                        Present Address
                                        <?php endif; ?>
                                        </label>
                                    <input type="text" class="form-control" name="present_discrict"
                                        id="present_discrict" placeholder="<?php if(session()->get('language') == 'bangla'): ?>জেলা/উপজেলা
                                        <?php elseif(session()->get('language') == 'arabic'): ?> المنطقة/أوبازيلا
                                        <?php else: ?> District/UpaZilla
                                        <?php endif; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2"><?php if(session()->get('language') == 'bangla'): ?>
                                        ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>  عنوان
                                        <?php else: ?>
                                        Address
                                        <?php endif; ?></label>
                                    <textarea class="form-control" name="present_tikana" id="present_tikana" cols="30" rows="5"
                                        placeholder="<?php if(session()->get('language') == 'bangla'): ?>ঠিকানা
                                        <?php elseif(session()->get('language') == 'arabic'): ?>  عنوان
                                        <?php else: ?> Address
                                        <?php endif; ?>"></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn_custom" style="width: 100%; border: none"><?php if(session()->get('language') == 'bangla'): ?>সাবমিট
                                <?php elseif(session()->get('language') == 'arabic'): ?>  يُقدِّم
                                <?php else: ?> Submit
                                <?php endif; ?> </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\volunteerform\volunteer_form.blade.php ENDPATH**/ ?>