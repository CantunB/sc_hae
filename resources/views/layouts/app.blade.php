<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'H.A.E') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Plugins css -->

        <!-- third party css -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
         <!-- Bootstrap Tables css -->
        <link href="{{ asset('assets/libs/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- App css -->

        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .btn-primary{
                background-color: #FF7F50
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

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('layouts.partials.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
          @include('layouts.partials.left_sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                    @yield('content')

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
                                &copy;{{date('Y') }}{{ config('app.name') }}. H. Ayuntamiento de Escárcega. All rights reserved.
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
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <!-- Plugins js-->
        <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Sweet alert init js-->
        <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <!-- Plugins js -->
        <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
        <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{asset('assets/libs/parsleyjs/i18n/es.js')}}"></script>
        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{asset('js/alerts.js')}}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.js" integrity="sha512-7x7HoEikRZhV0FAORWP+hrUzl75JW/uLHBbg2kHnPdFmScpIeHY0ieUVSacjusrKrlA/RsA2tDOBvisFmKc3xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('.dropify').dropify();
        </script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

        <!-- SELECTPICKER -->
        <script src="{{ asset('assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

        <!-- DATATABLES -->
        <script src="{{asset('assets/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/bootstrap-tables.init.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

        @toastr_js
        @toastr_render
        @if ($dependencies <= 0)
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "preventDuplicates": true,
                    "onclick": false,
                    "showDuration": 0,
                    "hideDuration": 0,
                    "timeOut": 0,
                    "extendedTimeOut": 0,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                }
                toastr.error("No se ha registrado ninguna dependencia");
            </script>
        @endif
        @if ($coordinations <= 0)
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "preventDuplicates": true,
                    "onclick": false,
                    "showDuration": 0,
                    "hideDuration": 0,
                    "timeOut": 0,
                    "extendedTimeOut": 0,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                }
                toastr.error("No se ha registrado ninguna coordinacion");
            </script>
        @endif
        @if ($departments <= 0)
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "preventDuplicates": true,
                    "onclick": false,
                    "showDuration": 0,
                    "hideDuration": 0,
                    "timeOut": 0,
                    "extendedTimeOut": 0,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                }
                toastr.error("No se ha registrado ningun departamento");
            </script>
        @endif
        @if ($areas <= 0)
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "preventDuplicates": true,
                    "onclick": false,
                    "showDuration": 0,
                    "hideDuration": 0,
                    "timeOut": 0,
                    "extendedTimeOut": 0,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                }
                toastr.error("No se han asignado las areas");
            </script>
        @endif
        @if ($providers <= 0)
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "preventDuplicates": true,
                    "onclick": false,
                    "showDuration": 0,
                    "hideDuration": 0,
                    "timeOut": 0,
                    "extendedTimeOut": 0,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                }
                toastr.error("No hay proveedores");
            </script>
        @endif
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('update'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('update') }}");
        @endif
    </script>
        {{--  <script type="text/javascript">

            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "preventDuplicates": true,
                "onclick": false,
                "showDuration": 0,
                {{-- "showDuration": "100", --}}
                {{--  "hideDuration": 0,  --}}
                {{-- "hideDuration": "1000", --}}
                {{-- "timeOut": "5000", --}}
                {{--  "timeOut": 0,  --}}
                {{-- "extendedTimeOut": "1000", --}}
                {{--  "extendedTimeOut": 0,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"  --}}
            {{--  };
            toastr.error('hola');
        </script>  --}}  --}}
        @stack('scripts')

    </body>
</html>
