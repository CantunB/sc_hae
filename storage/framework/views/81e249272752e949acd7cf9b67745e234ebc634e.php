<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo e(config('app.name', 'H.A.E')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">
    <!-- App css -->
    <link href="<?php echo e(asset('assets/css/bootstrap-creative.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo e(asset('assets/css/app-creative.css')); ?>" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo e(asset('assets/css/bootstrap-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo e(asset('assets/css/app-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    <!-- icons -->
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        .btn-primary{
            background-color: #FF7F50;
            border-bottom-color : #FF7F50;
            border-left-color : #FF7F50;
            border-right-color : #FF7F50;
            border-top-color : #FF7F50;
        }
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
            background-color: green!important;
          }

          .custom-checkbox .custom-control-input:checked:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(0, 255, 0, 0.25)
          }
          .custom-checkbox .custom-control-input:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(0, 0, 0, 0.25)
          }
          .custom-checkbox .custom-control-input:active ~ .custom-control-label::before {
            background-color: #C8FFC8;
          }
    </style>
</head>

<body class="loading authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo e(asset('assets/images/logo_ayuntamiento.png')); ?>" alt="" height="150">
                                            </span>
                                </a>

                                <a class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo e(asset('assets/images/logo_ayuntamiento.png')); ?>" alt="" height="22">
                                            </span>
                                </a>
                            </div>
                        </div>

                        <form id="form" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group mb-3">
                                <label for="NoEmpleado">No. Empleado</label>
                                <input class="form-control form-control <?php $__errorArgs = ['NoEmpleado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="NoEmpleado" name="NoEmpleado" required placeholder="SMAXXX">
                                <?php $__errorArgs = ['NoEmpleado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Contrase??a</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="********" required>
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" style="background-color: #FF7F50" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn  btn-block text-white" style="background-color: #FF7F50" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<footer class="footer footer-alt">
    <script>document.write(new Date().getFullYear())</script> &copy;<a href="" class="text-dark-50">CANTUN</a>
</footer>

<!-- Vendor js -->
<script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
<!-- App js -->
<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/parsleyjs/parsley.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/parsleyjs/i18n/es.js')); ?>"></script>
<script>
    $('#form').parsley();
</script>
</body>
</html>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/auth/login.blade.php ENDPATH**/ ?>