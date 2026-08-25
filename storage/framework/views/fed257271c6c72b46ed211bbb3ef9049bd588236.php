<?php $__env->startSection('content'); ?>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="<?php echo e(asset('frontend/images/bg/bg1.jpg')); ?>">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        
                        <ul class="breadcrumb white">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Featured Campaign -->
    <section>
        <h2 class="text-center">
            <?php if(session()->get('language') == 'bangla'): ?>
                <?php echo e($donation->bangla_title); ?>

            <?php elseif(session()->get('language') == 'arabic'): ?>
                <?php echo e($donation->arabic_title); ?>

            <?php else: ?>
                <?php echo e($donation->title); ?>

            <?php endif; ?>
        </h2>
        <div class="container pb-30">
            <div class="section-content">

                <div class="row multi-row-clearfix mb-30">
                    <div class="col-sm-6 col-md-12 col-lg-12 text-right">
                        <div class="share-buttons">
                            <!-- Facebook Share Button -->
                            <a href="#" class="btn btn-facebook btn-primary" onclick="shareOnFacebook('<?php echo e(url('donation/' .$donation->id)); ?>')">
                                <i class="fa fa-facebook"></i> Share on Facebook
                            </a>

                            <!-- WhatsApp Share Button -->
                            <a href="#" class="btn btn-whatsapp btn-success" onclick="shareOnWhatsApp('<?php echo e(url('donation/' .$donation->id)); ?>')" >
                                <i class="fa fa-whatsapp"></i> Share on WhatsApp
                            </a>

                            <!-- Copy Link Button -->
                            <button class="btn btn-copy-link btn-danger" onclick="copyLink('<?php echo e(url('donation/' .$donation->id)); ?>')">
                                <i class="fa fa-link"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    
                    function shareOnFacebook(postUrl) {
                        const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;
                        window.open(facebookShareUrl, '_blank');
                    }

                    function shareOnWhatsApp(postUrl) {
                        const whatsAppShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(postUrl)}`;
                        window.open(whatsAppShareUrl, '_blank');
                    }

                    function copyLink(postUrl) {
                        navigator.clipboard.writeText(postUrl).then(() => {
                            alert('Link copied to clipboard');
                        }).catch(err => {
                            console.error('Failed to copy link: ', err);
                        });
                    }

                    </script>


                <div class="row multi-row-clearfix">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="campaign bg-silver-light maxwidth500 mb-30">
                            <div class="thumb">
                                <img src="<?php echo e(asset($donation->image)); ?>" alt="" class="img-fullwidth">
                                <div class="campaign-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="campaign bg-silver-light maxwidth500 mb-30">
                            <div class="thumb">
                                <?php echo $donation->video_link; ?>

                            </div>
                            <p class="" style="text-align: center">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo $donation->short_des_bangla1; ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo $donation->short_des_ab1; ?>

                                <?php else: ?>
                                    <?php echo $donation->short_des1; ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: DonetForm & Testimonials -->
    

    <section class="container pb-60 pt-60" style="background-color: #F5F5F5">
        <div class="row">


            <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
            <?php endif; ?>

            <div class="col-sm-6 col-md-6 col-lg-6">
                <form action="<?php echo e(route('donation.payment')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($donation->id); ?>" name="donate_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    দানের পরিমাণ
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    مبلغ التبرع
                                <?php else: ?>
                                    Donation Amount
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="amount"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> দানের পরিমাণ
                                <?php elseif(session()->get('language') == 'arabic'): ?>مبلغ التبرع
                                <?php else: ?> Donation Amount <?php endif; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    দাতার নাম
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    اسم الشاورما
                                <?php else: ?>
                                    Doner Name
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="dname"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> দাতার নাম
                                <?php elseif(session()->get('language') == 'arabic'): ?>اسم الشاورما
                                <?php else: ?> Doner Name <?php endif; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    ডোনার ইমেল
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    البريد الإلكتروني/الهاتف للمتبرع
                                <?php else: ?>
                                    Doner Email
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="demail"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> ডোনার ইমেল/ফোন
                                <?php elseif(session()->get('language') == 'arabic'): ?>البريد الإلكتروني/الهاتف للمتبرع
                                <?php else: ?> Doner Email/Phone <?php endif; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    ফোন
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    البريد الإلكتروني/الهاتف للمتبرع
                                <?php else: ?>
                                    Phone
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="dphone"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> ফোন
                                <?php elseif(session()->get('language') == 'arabic'): ?>البريد الإلكتروني/الهاتف للمتبرع
                                <?php else: ?> Phone <?php endif; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                ট্রান্সেকশন  নাম্বার
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    بوابة الدفع
                                <?php else: ?>
                                Transaction
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="transaction_id"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> এসএসএল কমার্জ
                                <?php elseif(session()->get('language') == 'arabic'): ?>إس إس إل كوميرز
                                <?php else: ?> SSL Commerz
                                <?php endif; ?>"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                পেমেন্টের ধরন
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    بوابة الدفع
                                <?php else: ?>
                                    Payment taype
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9">
                                <select name="payment_type" id="" class="form-control" >
                                    <option value="bkash" name="bkash" class="form-control">Bkash</option>
                                    <option value="nagad" name="nagad" class="form-control">Nagad</option>
                                    <option value="rocket" name="rocket" class="form-control">Rocket</option>
                                    <option value="dbbl" name="dbbl" class="form-control">Dbbl</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <button class="btn btn-success pull-right mt-4">Confirm</button>
                </form>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6">
                <p style="text-align: center">
                    <?php if(session()->get('language') == 'bangla'): ?>
                    দাতব্য তহবিল/ব্যাঙ্ক অ্যাকাউন্টের বিবরণ
                <?php elseif(session()->get('language') == 'arabic'): ?>
                تفاصيل صندوق الجمعية الخيرية/حساب البنك
                <?php else: ?>
                Charity Fund/Bank Account Details
                <?php endif; ?>
                    </p>
                <hr>
                <?php if(session()->get('language') == 'bangla'): ?>
                    <?php echo $donation->long_des_bangla1; ?>

                <?php elseif(session()->get('language') == 'arabic'): ?>
                    <?php echo $donation->long_des_ab1; ?>

                <?php else: ?>
                    <?php echo $donation->long_des1; ?>

                <?php endif; ?>
            </div>
        </div>

    </section>


    <section>
        <div class="container pb-40">
            <div class="section-content">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-body">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo $donation->long_des_bangla2; ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo $donation->long_des_ab2; ?>

                                <?php else: ?>
                                    <?php echo $donation->long_des2; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    <?php echo $donation->long_des_bangla3; ?>

                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    <?php echo $donation->long_des_ab3; ?>

                                <?php else: ?>
                                    <?php echo $donation->long_des3; ?>

                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\donation\donation_money.blade.php ENDPATH**/ ?>