<section id="gallery">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title line-bottom mt-0 mb-30 text-center"><i
                            class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                        <?php if(session()->get('language') == 'bangla'): ?>
                            ফটো
                        <?php elseif(session()->get('language') == 'arabic'): ?>
                            صورة
                        <?php else: ?>
                            Photo
                        <?php endif; ?>
                        <span class="text-theme-colored">
                            <?php if(session()->get('language') == 'bangla'): ?>
                                গ্যালরি
                            <?php elseif(session()->get('language') == 'arabic'): ?>
                                صالة عرض
                            <?php else: ?>
                                Gallery
                            <?php endif; ?>
                        </span>
                    </h2>

                    <!-- Portfolio Gallery Grid -->
                    <div class="grid">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="grid-item">
                                <a href="<?php echo e(asset($gallery->image)); ?>" data-lightbox="gallery">
                                    <img src="<?php echo e(asset($gallery->image)); ?>" alt="gallery image">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <i class="fa fa-picture-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- End Portfolio Gallery Grid -->

                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\gallery\gallery.blade.php ENDPATH**/ ?>