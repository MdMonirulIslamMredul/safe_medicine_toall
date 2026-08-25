<footer id="footer" class="footer" data-bg-img="<?php echo e(asset('frontend/images/footer-bg.png')); ?>" data-bg-color="#25272e">
    <?php
        $links = App\Models\WebsiteLinks::latest()->first();
        $logo = \App\Models\Logo::latest()->first();
    ?>
    <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-20" alt="" src="<?php echo e(asset($logo->logo_image)); ?>" style="width: 85px; height: 85px;">
                    <p><?php echo e($links->address); ?></p>
                    <ul class="list-inline mt-5">
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#"> <?php echo e($links->number); ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#"><?php echo e($links->email); ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#"><?php echo e($links->facebook); ?></a> </li>
                    </ul>
                    <ul class="social-icons icon-dark icon-theme-colored icon-circled icon-sm mt-15">
                        <li><a href="<?php echo e($links->facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                        
                        <li><a href="<?php echo e($links->linkedIn); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="<?php echo e($links->youtube); ?>"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="<?php echo e($links->instagram); ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            সর্বশেষ সংবাদ
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            أحدث الأخبار
                        <?php else: ?>
                            Latest News
                        <?php endif; ?>
                    </h5>
                    <div class="latest-posts">
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="<?php echo e(asset('frontend/images/blog/ln1.jpg')); ?>"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            টেকসই নির্মাণ
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            البناء المستدام الأخبار
                                        <?php else: ?>
                                            Sustainable Construction
                                        <?php endif; ?>
                                    </a></h5>
                                <p class="post-date mb-0">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        ০৮ মার্চ , ২০১৫
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        ٠٨ ماركه ، ٢٠١٥
                                    <?php else: ?>
                                        Mar 08, 2015
                                    <?php endif; ?>
                                </p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="<?php echo e(asset('frontend/images/blog/ln2.jpg')); ?>"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            শিল্প আবরণ
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            الطلاءات الصناعية
                                        <?php else: ?>
                                            Industrial Coatings
                                        <?php endif; ?>
                                    </a>
                                </h5>
                                <p class="post-date mb-0">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        ০৮ মার্চ , ২০১৫
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        ٠٨ ماركه ، ٢٠١٥
                                    <?php else: ?>
                                        Mar 08, 2015
                                    <?php endif; ?>
                                </p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="<?php echo e(asset('frontend/images/blog/ln3.jpg')); ?>"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        <?php if(session()->get('language') == 'bangla'): ?>
                                            স্টোরফ্রন্ট ইনস্টলেশন
                                        <?php elseif(session()->get('language') == 'arabic'): ?>
                                            تركيبات واجهات المحلات
                                        <?php else: ?>
                                            Storefront Installations
                                        <?php endif; ?>
                                    </a></h5>
                                <p class="post-date mb-0">
                                    <?php if(session()->get('language') == 'bangla'): ?>
                                        ০৮ মার্চ , ২০১৫
                                    <?php elseif(session()->get('language') == 'arabic'): ?>
                                        ٠٨ ماركه ، ٢٠١٥
                                    <?php else: ?>
                                        Mar 08, 2015
                                    <?php endif; ?>
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            উপকারী সংজুক
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            روابط مفيدة
                        <?php else: ?>
                            Useful Links
                        <?php endif; ?>
                    </h5>
                    <ul class="list angle-double-right list-border">
                        <li><a href="<?php echo e(url('/')); ?>">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    হোম
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    بيت
                                <?php else: ?>
                                    Home
                                <?php endif; ?>
                            </a></li>
                        <li><a href="<?php echo e(route('about.menu')); ?>">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    আমাদের সম্পর্কে
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    معلومات عنا
                                <?php else: ?>
                                    About Us
                                <?php endif; ?>
                            </a></li>
                        <li><a href="#">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    প্রচারণা
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    حملة
                                <?php else: ?>
                                    Campaign
                                <?php endif; ?>
                            </a></li>
                        <li><a href="<?php echo e(route('blog.page')); ?>">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    সর্বশেষ সংবাদ
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    أحدث الأخبار
                                <?php else: ?>
                                    Latest News
                                <?php endif; ?>
                            </a></li>
                        <li><a href="<?php echo e(route('gallery.page')); ?>">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    গ্যালারি
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    صالة عرض
                                <?php else: ?>
                                    Gallery
                                <?php endif; ?>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            ফটোস ফ্রম ফ্লিকর
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            صور من فليكر
                        <?php else: ?>
                            Photos from Flickr
                        <?php endif; ?>
                    </h5>
                    
                    <form action="<?php echo e(route('subscribe')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">
                                <?php if(session()->get('language') == 'bangla'): ?>
                                    সাবস্ক্রাইব করুন
                                <?php elseif(session()->get('language') == 'arabic'): ?>
                                    اشترك الآن
                                <?php else: ?>
                                    Subscribe Now
                                <?php endif; ?>
                            </label>
                            <div class="input-group">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="<?php if(session()->get('language') == 'bangla'): ?> আপনার ইমেল ঠিকানা লিখুন
                                <?php elseif(session()->get('language') == 'arabic'): ?>
أدخل بريدك الإلكتروني                                   <?php else: ?> Enter your email <?php endif; ?>"
                                    required>
                                <button type="submit" class="btn btn-subscribe">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-black-333">
        <div class="container pt-15 pb-10">
            <div class="row">
                <div class="col-md-12">

                    <?php
                        $footer = App\Models\FooterDetail::latest()->first();
                    ?>

                    <p class="m-0 text-center" style="color:white;">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            <?php echo e($footer->details_b); ?>

                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            <?php echo e($footer->details_ab); ?>

                        <?php else: ?>
                            <?php echo e($footer->details); ?>

                        <?php endif; ?>
                        <br>
                        <?php if(session()->get('language') == 'bangla'): ?>
                            <?php echo e($footer->credit_b); ?>

                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            <?php echo e($footer->credit_ab); ?>

                        <?php else: ?>
                            <?php echo e($footer->credit); ?>

                        <?php endif; ?>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/includes/footer.blade.php ENDPATH**/ ?>