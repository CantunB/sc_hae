<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ROLES</a></li>
                    <li class="breadcrumb-item active">EDITAR</li>
                </ol>
            </div>
            <h4 class="page-title">Editar rol <?php echo e($roles->name); ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
          <!---  <h4 class="header-title">Borderless table</h4>
            <p class="sub-header">
                For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.
            </p>
            -->

            <div class="table-responsive">
                <form action="<?php echo e(action('RoleController@update', $roles->id)); ?>" method="POST" class="form-group">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <table class="table table-borderless mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th style="text-align: center">Crear</th>
                            <th style="text-align: center">Leer</th>
                            <th style="text-align: center">Actualizar</th>
                            <th style="text-align: center">Eliminar</th>
                        </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td>Usuarios</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "4"): ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input type="checkbox" id="chkuser" name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="chkuser"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Roles</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "8"): ?>
                                            <?php if($item < "4") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Permisos</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "12"): ?>
                                            <?php if($item < "8") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Departamentos</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "16"): ?>
                                            <?php if($item < "12") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Coordinaciones</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "20"): ?>
                                            <?php if($item < "16") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Requisiciones</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "24"): ?>
                                            <?php if($item < "20") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Cotizaciones</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "28"): ?>
                                            <?php if($item < "24") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Proveedores</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "32"): ?>
                                            <?php if($item < "28") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Compras</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "36"): ?>
                                            <?php if($item < "32") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Almacen</td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "40"): ?>
                                            <?php if($item < "36") continue; ?>
                                            <td style="text-align: center">
                                                <div class="checkbox checkbox-blue mb-2">
                                                    <input class="chkpermisos case" id="checkbox3" type="checkbox"  name="permission[]"
                                                           value="<?php echo e($val->id); ?>" <?php echo e($roles->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>>
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                    </table>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </button>
                        <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                        </a>
                    </div>
                </form>
            </div> <!-- end table-responsive-->

        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div>
<!--- end r

<?php $__env->startPush('scripts'); ?>
    <script>
        var $table = $('#table')
    </script>
  <script>
/*---------------------CHECKBOX USUARIOS-------------------------------*/
$("#selectallusers").on("click", function() {
  $(".chkusers").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkuser").on("click", function() {
  if ($(".chkusers").length == $(".chkusers:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX ROLES-------------------------------*/

$("#selectallroles").on("click", function() {
  $(".chkroles").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkroles").on("click", function() {
  if ($(".chkroles").length == $(".chkroles:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX PERMISOS-------------------------------*/

$("#selectallpermisos").on("click", function() {
  $(".chkpermisos").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkpermisos").on("click", function() {
  if ($(".chkpermisos").length == $(".chkpermisos:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});



/*---------------------CHECKBOX ELECTORES-------------------------------*/

$("#selectallelectores").on("click", function() {
  $(".chkelectores").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkelectores").on("click", function() {
  if ($(".chkelectores").length == $(".chkelectores:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});


/*---------------------CHECKBOX ANFITRIONES-------------------------------*/

$("#selectallanf").on("click", function() {
  $(".chkanf").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkanf").on("click", function() {
  if ($(".chkanf").length == $(".chkanf:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX SIMPATIZANTES-------------------------------*/

$("#selectallsim").on("click", function() {
  $(".chksim").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chksim").on("click", function() {
  if ($(".chksim").length == $(".chksim:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX RESP. SECCION-------------------------------*/

$("#selectallrs").on("click", function() {
  $(".chkrs").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkrs").on("click", function() {
  if ($(".chkrs").length == $(".chkrs:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX RESP. MANZANA-------------------------------*/

$("#selectallrm").on("click", function() {
  $(".chkrm").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkrm").on("click", function() {
  if ($(".chkrm").length == $(".chkrm:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX SECCIONEs-------------------------------*/

$("#selectallrm").on("click", function() {
  $(".chkseccion").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkseccion").on("click", function() {
  if ($(".chkseccion").length == $(".chkseccion:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX MANZANA-------------------------------*/

$("#selectallrm").on("click", function() {
  $(".chkmanzana").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkmanzana").on("click", function() {
  if ($(".chkmanzana").length == $(".chkmanzana:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});


/*---------------------CHECKBOX TODOS LOS PERMISOS-------------------------------*/

$("#selectall").on("click", function() {
  $(".case").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".case").on("click", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/roles/edit.blade.php ENDPATH**/ ?>