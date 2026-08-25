<!-- Favicon and Touch Icons -->
<link href="<?php echo e(asset('frontend/images/favicon.png')); ?>" rel="shortcut icon" type="image/png">
<link href="<?php echo e(asset('frontend/images/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
<link href="<?php echo e(asset('frontend/images/apple-touch-icon-72x72.png')); ?>" rel="apple-touch-icon" sizes="72x72">
<link href="<?php echo e(asset('frontend/images/apple-touch-icon-114x114.png')); ?>" rel="apple-touch-icon" sizes="114x114">
<link href="<?php echo e(asset('frontend/images/apple-touch-icon-144x144.png')); ?>" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('frontend/css/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('frontend/css/animate.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('frontend/css/css-plugin-collections.css')); ?>" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?php echo e(asset('frontend/css/menuzord-skins/menuzord-rounded-boxed.css')); ?>" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?php echo e(asset('frontend/css/style-main.css')); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?php echo e(asset('frontend/css/preloader.css')); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo e(asset('frontend/css/custom-bootstrap-margin-padding.css')); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo e(asset('frontend/css/responsive.css')); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?php echo e(asset('frontend/js/revolution-slider/css/settings.css')); ?>" rel="stylesheet" type="text/css"/>
<link  href="<?php echo e(asset('frontend/js/revolution-slider/css/layers.css')); ?>" rel="stylesheet" type="text/css"/>
<link  href="<?php echo e(asset('frontend/js/revolution-slider/css/navigation.css')); ?>" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?php echo e(asset('frontend/css/colors/theme-skin-green.css')); ?>" rel="stylesheet" type="text/css">

<!-- Footer Scripts -->
<!-- external javascripts -->
<script src="<?php echo e(asset('frontend/js/jquery-2.2.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo e(asset('frontend/js/jquery-plugin-collection.js')); ?>"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?php echo e(asset('frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js')); ?>"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Include SimpleBar CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.css">
<!-- Masonry CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.min.css">
<!-- Lightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">




<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        <?php if(session('delete_success')): ?>
            toastr.error('<?php echo e(session('delete_success')); ?>');
        <?php endif; ?>
    });
</script>

<script>
    $(document).ready(function() {
        <?php if(session('message')): ?>
            toastr.success('<?php echo e(session('message')); ?>');
        <?php endif; ?>
    });
</script>

 

<?php echo $__env->yieldPushContent('frontend_style'); ?>
<?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/includes/style.blade.php ENDPATH**/ ?>