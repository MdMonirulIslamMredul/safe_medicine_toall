<section class="team-wrap ptb-100 bg-chathamas">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="section-title style2 text-center mb-40">
                    <span>Our Instructor</span>
                    <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->page == 'instructor' ): ?>
                            <h2><?php echo e($data->title); ?></h2>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="team-slider-one owl-carousel">
            <?php if(isset($teams)): ?>
            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <img src="<?php echo e(asset($team->image)); ?>" alt="Image">
                <div class="team-info">
                    <a href="mailto:<?php echo e($team->email); ?>" class="team-mail"><i class="ri-mail-send-line"></i></a>
                    <h3><?php echo e($team->name); ?></h3>
                    <span><?php echo e($team->designation); ?></span>
                    <ul class="social-profile style2 list-style">
                        <li>
                            <a target="_blank" href="<?php echo e($team->facebook); ?>">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo e($team->youtube); ?>">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo e($team->instagram); ?>">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo e($team->linkedIn); ?>">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\team\team.blade.php ENDPATH**/ ?>