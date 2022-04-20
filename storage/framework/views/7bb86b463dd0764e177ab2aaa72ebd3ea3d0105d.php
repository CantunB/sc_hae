<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo e(config('app.name', 'SMAPAC URM')); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

        <!-- Plugins css -->

        <!-- third party css -->
        <link href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
         <!-- Bootstrap Tables css -->
        <link href="<?php echo e(asset('assets/libs/bootstrap-table/bootstrap-table.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/selectize/css/selectize.bootstrap3.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="<?php echo e(asset('assets/css/bootstrap-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="<?php echo e(asset('assets/css/app-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <link href="<?php echo e(asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- icons -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php echo $__env->make('layouts.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
          <?php echo $__env->make('layouts.partials.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                    <?php echo $__env->yieldContent('content'); ?>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                &copy;<?php echo e(date('Y')); ?><?php echo e(config('app.name')); ?>. Sistema Municipal de Agua Potable y Alcantarillado de Carmen (SMAPAC). H. Ayuntamiento de Carmen. All rights reserved.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
        <!-- Plugins js-->
        <script src="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/selectize/js/standalone/selectize.min.js')); ?>"></script>
        <!-- Sweet Alerts js -->
        <script src="<?php echo e(asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <!-- Sweet alert init js-->
        <script src="<?php echo e(asset('assets/js/pages/sweet-alerts.init.js')); ?>"></script>
        <!-- Plugins js -->
        <script src="<?php echo e(asset('assets/libs/dropzone/min/dropzone.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/dropify/js/dropify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/parsleyjs/parsley.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/parsleyjs/i18n/es.js')); ?>"></script>
        <!-- App js-->
        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/alerts.js')); ?>" defer></script>
        <?php echo $__env->yieldPushContent('scripts'); ?>

        <!-- SELECTPICKER -->
        <script src="<?php echo e(asset('assets/libs/multiselect/js/jquery.multi-select.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>

        <!-- DATATABLES -->
        <script src="<?php echo e(asset('assets/libs/bootstrap-table/bootstrap-table.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/bootstrap-tables.init.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/datatables.init.js')); ?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo e(asset('assets/libs/bootstrap-table/bootstrap-table.min.js')); ?>"></script>
        <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
        <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
    </body>
</html>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/layouts/app.blade.php ENDPATH**/ ?>