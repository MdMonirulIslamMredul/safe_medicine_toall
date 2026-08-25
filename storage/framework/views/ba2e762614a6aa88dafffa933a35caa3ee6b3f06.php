  <section style="background-color: #F5F5F5">
    <div class="container pb-40">
      <div class="section-title text-center">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-uppercase line-bottom-center mt-0"> <?php if(session()->get('language')=='bangla'): ?> চলুন একসাথে একটি পরিবর্তন আনি <?php elseif(session()->get('language')=='arabic'): ?> معًا لنصنع التغيير <?php else: ?> Together Let’s make a change <?php endif; ?>  </h2>
          </div>
        </div>
      </div>
      <div class="row multi-row-clearfix">
        <div class="owl-carousel-4col" data-dots="true">
          <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item custom_card" style="margin: 20px; border-radius: 20px; overflow: hidden;">
            <div class="campaign bg-white maxwidth500">
              <div class="thumb">
                <img src="<?php echo e(asset($donation->image)); ?>" style="height: 250px;" alt="" class="img-fullwidth">
                <div class="campaign-overlay"></div>
              </div>
              <div class="campaign-details clearfix p-15 pt-10 pb-10" style="height:300px">
                <h4 class="font-weight-700 mt-0"><a href="#"></a><?php if(session()->get('language')=='bangla'): ?> <?php echo e($donation->bangla_title); ?>

                    <?php elseif(session()->get('language')=='arabic'): ?> <?php echo e($donation->arabic_title); ?> <?php else: ?> <?php echo e($donation->title); ?> <?php endif; ?></h4>
                <div style="width:100%;height:130px; overflow-y: scroll;">
                    <p>
                        <?php if(session()->get('language')=='bangla'): ?> <?php echo $donation->short_des_bangla1; ?>

                    <?php elseif(session()->get('language')=='arabic'): ?> <?php echo $donation->short_des_ab1; ?> <?php else: ?> <?php echo $donation->short_des1; ?> <?php endif; ?>
                    </p>
                </div>
                <div class="campaign-bottom clearfix mt-20 mb-10" style="text-align: center">
                  <a class="btn_custom" href="<?php echo e(route('donation',$donation->id)); ?>"><?php if(session()->get('language')=='bangla'): ?> দান করুন <?php elseif(session()->get('language')=='arabic'): ?> تبرع الآن <?php else: ?> Donate Now <?php endif; ?></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </section>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/donation/donation.blade.php ENDPATH**/ ?>