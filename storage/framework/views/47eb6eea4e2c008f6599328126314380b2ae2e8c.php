     <!-- Section: project -->
     <section id="blog bg-light">
        <div class="container pb-sm-30">
          <div class="section-title text-center">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="text-uppercase line-bottom-center mt-0"> <?php if(session()->get('language')=='bangla'): ?> চলমান প্রজেক্ট <?php else: ?> Ongoing projects <?php endif; ?> </h2>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post clearfix mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb" > 
                      <img src="<?php echo e(asset($project->image)); ?>" alt="" class="img-responsive img-fullwidth" style="height: 200px">
                    </div>
                  </div>
                  <div class="entry-content p-20">
                    <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html"><?php if(session()->get('language')=='bangla'): ?> <?php echo e($project->title_bangla); ?> <?php else: ?> <?php echo e($project->title); ?> <?php endif; ?> </a></h4>
                   <div style="width:100%;height:150px; overflow-y: scroll;">
                    <p class="mt-5"><?php if(session()->get('language')=='bangla'): ?> <?php echo $project->short_des_bangla; ?> <?php else: ?> <?php echo $project->short_des_eng; ?> <?php endif; ?> </p>
                   </div>
                   <div class="" style="text-align: center">
                    <a class="btn btn-theme-colored btn-sm mt-10" href="<?php echo e(route('project.details',$project->id)); ?>" style=""> View Details</a>
                   </div>
                    
                  </div>
                </article>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            

            </div>
          </div>
        </div>
      </section><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\projects\project.blade.php ENDPATH**/ ?>