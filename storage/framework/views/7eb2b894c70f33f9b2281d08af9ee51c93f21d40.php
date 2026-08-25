<header id="header" class="header">
    <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
      <div class="container">
        <?php
          $links = App\Models\WebsiteLinks::latest()->first();
          $logo = \App\Models\Logo::latest()->first()
        ?>

        <div class="row">
          <div class="col-md-5">
            <div class="widget no-border m-0">
              <ul class="list-inline xs-text-center text-white mt-5">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> <?php echo e($links->number); ?></a></li>
                <li class="m-0 pl-10 pr-10">
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> <?php echo e($links->email); ?></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 pr-0">
            <div class="widget no-border m-0">
              
              <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="<?php echo e($links->facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                
                <li><a href="<?php echo e($links->linkedIn); ?>"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="<?php echo e($links->youtube); ?>"><i class="fa fa-youtube"></i></a></li>
                <li><a href="<?php echo e($links->instagram); ?>"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex flex-row">
              <a class="btn btn-colored btn-flat btn-theme-colored pb-10" href="<?php echo e(route('all.donation')); ?>"><?php if(session()->get('language')=='bangla'): ?> দান করুন <?php elseif(session()->get('language')=='arabic'): ?> هبة <?php else: ?> Donation <?php endif; ?> </a>
              <a class="text-white" href="<?php echo e(route('english.language')); ?>"><span class="text-danger">LN:</span> English |</a>
              <a class="text-white" href="<?php echo e(route('bangla.language')); ?>">বাংলা |</a>
              
            </div>
          </div>

          
        </div>
      </div>
    </div>
  <style>
        @media  only screen and (max-width: 600px) and (min-width: 400px) {
    .respo{
    height: 90px !important;
    width: 60% !important;
    }
    }
  </style>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container" style="padding: 5px 10px 0 10px;">

          <nav id="menuzord-right" class="respo menuzord default">
            <a class="text-center" href="<?php echo e(url('/')); ?>">
              <?php $logo = \App\Models\Logo::latest()->first() ?>
              <img src="<?php echo e(asset($logo->logo_image1)); ?>" alt="" class="" style="height: 80px;
    width: 80px;">
            </a>
            <ul class="menuzord-menu text-center" style="margin: 0 auto;">
              <li class="<?php echo e(Request()->is('/')? 'active':''); ?>"><a href="<?php echo e(url('/')); ?>"><?php if(session()->get('language')=='bangla'): ?> হোম <?php elseif(session()->get('language')=='arabic'): ?> بيت <?php else: ?> Home <?php endif; ?></a>

              </li>
              <li class="<?php echo e(Request()->is('about_menu')? 'active':''); ?>"><a href="<?php echo e(route('about.menu')); ?>"><?php if(session()->get('language')=='bangla'): ?> আমাদের সম্পর্কে <?php elseif(session()->get('language')=='arabic'): ?> معلومات عنا <?php else: ?> About Us <?php endif; ?></a>
              </li>
              <?php
                $categories = App\Models\Category::get();
              ?>

              <li class="<?php echo e(Request()->is('unsafe-medicine-report')? 'active':''); ?>"><a href="<?php echo e(route('unsafe.medicine.report')); ?>"><?php if(session()->get('language')=='bangla'): ?> মেডিসিন রিপোর্ট <?php else: ?> Unsafe Medicine Report <?php endif; ?> </a></li>

              <li><a href="<?php echo e(route('blog.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> সংবাদ <?php elseif(session()->get('language')=='arabic'): ?> أخبار <?php else: ?> News <?php endif; ?> </a></li>


              
              <li><a href="#"><?php if(session()->get('language') == 'bangla'): ?> হেলথ টিপস  <?php else: ?> Health Tips <?php endif; ?> </a>

                 <ul class="dropdown">
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-left"><a href="<?php echo e(route('department.details',$department->id)); ?>"><?php if(session()->get('language')=='bangla'): ?> <?php echo e($department->title_bn); ?> <?php else: ?> <?php echo e($department->title_en); ?> <?php endif; ?> </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>

              </li>


              



              

                <li><a href="#"><?php if(session()->get('language') == 'bangla'): ?> গ্যালারি <?php elseif(session()->get('language')=='arabic'): ?> صالة عرض <?php else: ?> Gallery <?php endif; ?> </a>
                  <ul class="dropdown">
                    <li class="text-left"><a href="<?php echo e(route('gallery.page')); ?>"><?php if(session()->get('language')=='bangla'): ?> ফটো গ্যালারি <?php elseif(session()->get('language')=='arabic'): ?> معرض الصور <?php else: ?> Image Gallery <?php endif; ?> </a>
                    </li>
                    <li class="text-left"><a href="<?php echo e(route('video.gallery')); ?>"><?php if(session()->get('language')=='bangla'): ?> ভিডিও গ্যালারি <?php elseif(session()->get('language')=='arabic'): ?> معرض الفيديو <?php else: ?> Video Gallery <?php endif; ?> </a>
                    </li>
                  </ul>
                </li>

              </li>
              <li><a href="<?php echo e(route('volunteer.form')); ?>"><?php if(session()->get('language')=='bangla'): ?> স্বেচ্ছাসেবক <?php elseif(session()->get('language')=='arabic'): ?> متطوع <?php else: ?> Volunteer <?php endif; ?> </a>

              </li>

              <li><a href="<?php echo e(route('all.donation')); ?>"><?php if(session()->get('language')=='bangla'): ?>  দান করুন <?php else: ?> Donate <?php endif; ?> </a></li>

              <li><a href="<?php echo e(route('contacts')); ?>"><?php if(session()->get('language')=='bangla'): ?>  যোগাযোগ <?php else: ?> Contacts <?php endif; ?> </a></li>


              <?php if(auth()->guard()->guest()): ?>
              <li class="<?php echo e(Request()->is('login')? 'active':''); ?>">
                <a  href="<?php echo e(route('login')); ?>"> <?php if(session()->get('language')=='bangla'): ?>  প্রবেশ করুন <?php elseif(session()->get('language')=='arabic'): ?> تسجيل الدخول <?php else: ?> Login <?php endif; ?> </a>
              </li>
              <?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
              <li><a href="#"><?php if(session()->get('language') == 'bangla'): ?> ইউসার <?php elseif(session()->get('language')=='arabic'): ?> مستخدم <?php else: ?> User <?php endif; ?> </a>
                <ul class="dropdown">
                  <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><?php if(session()->get('language')=='bangla'): ?> লগআউট <?php elseif(session()->get('language')=='arabic'): ?> تسجيل خروج <?php else: ?> Logout <?php endif; ?> </a>
                  </li>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
                </ul>
              </li>
              <?php endif; ?>





            </ul>
          </nav>
          


        </div>
      </div>
    </div>
  </header>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\frontend\includes\header.blade.php ENDPATH**/ ?>