<?php $__env->startSection('content'); ?>
    <style>
        #toolbar {
        margin: 0;
        }
    </style>
<!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                         <form id="date-range" class="form-inline">
                                          <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border" id="dash-daterange">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-blue border-blue text-white">
                                                               <i class="mdi mdi-calendar-range"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                <i class="fe-dollar-sign font-22 avatar-title text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">$<span data-plugin="counterup"></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Salida</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Ventas de Hoy</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Ordenes de compras</h4>
                                    <div id="herramientas">
                                        <button id="btn_aut" class="btn btn-success btn-sm"><i class="mdi mdi-check mr-1"></i>Autorizar</button>
                                        <button id="btn_dis" class="btn btn-danger btn-sm"><i class="mdi mdi-close-thick mr-1"></i>No autorizar</button>
                                      </div>
                                      <form id="ordenes" >
                                          <?php echo csrf_field(); ?>
                                    <table id="ordenes"  data-toggle="table"
                                           data-toolbar="#herramientas"
                                           data-search="true"
                                           data-show-columns="true"
                                           data-buttons-class="primary"
                                           data-page-list="[5, 10, 20]"
                                           data-page-size="5"
                                           data-show-footer="true"
                                           data-click-to-select="true"
                                           data-pagination="true"  class="table-borderless">
                                        <thead class="thead-light">
                                            <tr>
                                                <th data-field="chk" data-footer-formatter="idTotal"></th>
                                                <th data-field="department_id" data-sortable="true">Departamento</th>
                                                <th data-field="pur_order_details_id" data-sortable="true">Orden de compra</th>
                                                <th data-field="provider" data-sortable="true">Proveedor</th>
                                                <th data-field="amount" data-align="center" data-sortable="true" data-footer-formatter="idMonto">Monto con IVA</th>
                                                <th data-field="status" data-align="center">Status</th>
                                                <th data-field="action" data-align="center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>

                                </form>
                                    <div id="prueba"></div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->
<?php $__env->startPush('scripts'); ?>
<script>
    $("#dash-daterange").flatpickr(
        {
            altInput:!0,
            mode:"range",
            altFormat:"F j, y",
            defaultDate:"today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
            onChange: function(selectedDates, dateStr, instance)     {
               // alert(dateStr);
                console.log(dateStr);
                var url="<?php echo route('home.daterange'); ?>";
                    $.ajax({
                        type:"POST",
                        url: url,
                        data:dateStr,
                        success: function(result){
                            $("#prueba").html(result);
                            //location.reload();
                        }});
                    return false;
            }
        });
</script>
<script>

    var $refresh = $("button[name='data-show-refresh']")
    //var select= []
    function idTotal() {
      return 'Total'
    }

    function idMonto(data) {
        var field = this.field
        return '$' + data.map(function (row) {
            return +row[field].substring(1)
        }).reduce(function (sum, i) {
            return sum + i
        }, 0)
    }

        var formulario = $("#ordenes");
        $("#btn_aut").on("click",function(){
           // event.preventDefault();
        //   var url="http://127.0.0.1:8000/compras/ordenes/autorizar";
           var url="<?php echo route('ordenes.autorizar_ordenes'); ?>";
            $.ajax({
                type:"POST",
                url: url,
                data:formulario.serialize(),
                success: function(result){
                $("#prueba").html(result);
                    location.reload();
            }});
            return false;
        });

        var formulario = $("#ordenes");
        $("#btn_dis").on("click",function(){
           // event.preventDefault();
           var url="<?php echo route('ordenes.ordenes_no_autorizar'); ?>";
            $.ajax({
                type:"POST",
                url: url,
                data:formulario.serialize(),
                success: function(result){
                $("#prueba").html(result);
                    location.reload();
               // alert(result);
                //alert('hola');

            }});
            return false;
        });

</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/home.blade.php ENDPATH**/ ?>