<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">PERMISOS</a></li>
                    <li class="breadcrumb-item active">ASIGNAR</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Asignar permisos para <?php echo e($user->name); ?></strong></h2>
                <p class="sub-header">
                <div class="form-group">
           <input type="radio"
           id="selectall"
          name="special"
          > Acceso Total <span><strong>( Seleccionar todo los permisos existentes)</strong></span></p>
    </div>

                <div class="container">
                    <form action="<?php echo e(action('PermissionController@update', $user->id)); ?>" method="POST" class="form-group">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <table data-toggle="table"
                                data-page-size="10"
                                data-buttons-class="xs btn-light"
                                data-pagination="true" class="table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th><input type="checkbox" class="case" id="selectallusers"> Usuarios</th>
                                    <th><input type="checkbox" class="case" id="selectallroles"> Roles</th>
                                    <th><input type="checkbox" class="case" id="selectallpermisos"> Permisos</th>
                                    <th><input type="checkbox" class="case" id="selectallelectores"> Departamentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "4"): ?>

                                                <li>
                                                <label>
                                                    <input type="checkbox"
                                                        class="chkusers case"
                                                        name="permission[]"
                                                        value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                    ><strong> <?php echo e($val->name); ?></strong>
                                                </label>
                                                </li>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item < "8"): ?>
                                            <?php if($item < "4") continue; ?>
                                                    <li>
                                                    <label>

                                                        <input type="checkbox"
                                                            class="chkroles case"
                                                            name="permission[]"
                                                            value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                        ><strong> <?php echo e($val->name); ?></strong>
                                                    </label>
                                                    </li>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item < "12"): ?>
                                            <?php if($item < "8") continue; ?>
                                                    <li>
                                                    <label>

                                                        <input type="checkbox"
                                                            class="chkpermisos case"
                                                            name="permission[]"
                                                            value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                        ><strong> <?php echo e($val->name); ?></strong>
                                                    </label>
                                                    </li>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item < "16"): ?>
                                            <?php if($item < "12") continue; ?>
                                                    <li>
                                                    <label>

                                                        <input type="checkbox"
                                                            class="chkelectores case"
                                                            name="permission[]"
                                                            value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                        ><strong> <?php echo e($val->name); ?></strong>
                                                    </label>
                                                    </li>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table data-toggle="table"
                                data-page-size="10"
                                data-buttons-class="xs btn-light"
                                data-pagination="true" class="table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th><input type="checkbox" class="case" id="selectallanf"> Coordinaciones</th>
                                    <th><input type="checkbox" class="case" id="selectallsim"> Requisicion</th>
                                    <th><input type="checkbox" class="case" id="selectallrs"> Cotizacion</th>
                                    <th><input type="checkbox" class="case" id="selectallrm"> Proveedores</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item < "20"): ?>
                                <?php if($item < "16") continue; ?>
                                            <li>
                                            <label>
                                                <input type="checkbox"
                                                    class="chkanf case"
                                                    name="permission[]"
                                                    value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                ><strong> <?php echo e($val->name); ?></strong>
                                            </label>
                                            </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item < "24"): ?>
                                    <?php if($item < "20") continue; ?>
                                                <li>
                                                <label>
                                                    <input type="checkbox"
                                                        class="chksim case"
                                                        name="permission[]"
                                                        value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                    ><strong> <?php echo e($val->name); ?></strong>
                                                </label>
                                                </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "28"): ?>
                                        <?php if($item < "24") continue; ?>
                                                    <li>
                                                    <label>
                                                        <input type="checkbox"
                                                            class="chkrs case"
                                                            name="permission[]"
                                                            value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                        ><strong> <?php echo e($val->name); ?></strong>
                                                    </label>
                                                    </li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item < "32"): ?>
                                    <?php if($item < "28") continue; ?>
                                                <li>
                                                <label>
                                                    <input type="checkbox"
                                                        class="chkrm case"
                                                        name="permission[]"
                                                        value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                    ><strong> <?php echo e($val->name); ?></strong>
                                                </label>
                                                </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table data-toggle="table"
                                data-page-size="10"
                                data-buttons-class="xs btn-light"
                                data-pagination="true" class="table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th><input type="checkbox" class="case" id="selectallanf"> Compras</th>
                                    <th><input type="checkbox" class="case" id="selectallsim"> Almacen</th>
                                    <th><input type="checkbox" class="case" id="selectallanf"> &nbsp;</th>
                                    <th><input type="checkbox" class="case" id="selectallanf"> &nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item < "36"): ?>
                                <?php if($item < "32") continue; ?>
                                            <li>
                                            <label>
                                                <input type="checkbox"
                                                    class="chkseccion case"
                                                    name="permission[]"
                                                    value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                ><strong> <?php echo e($val->name); ?></strong>
                                            </label>
                                            </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item < "40"): ?>
                                    <?php if($item < "36") continue; ?>
                                                <li>
                                                <label>
                                                    <input type="checkbox"
                                                        class="chkmanzana case"
                                                        name="permission[]"
                                                        value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                    ><strong> <?php echo e($val->name); ?></strong>
                                                </label>
                                                </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item < "44"): ?>
                                        <?php if($item < "40") continue; ?>
                                                    <li>
                                                    <label>
                                                        <input type="checkbox"
                                                            class="case"
                                                            name="permission[]"
                                                            value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                        ><strong> <?php echo e($val->name); ?></strong>
                                                    </label>
                                                    </li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item < "48"): ?>
                                    <?php if($item < "44") continue; ?>
                                                <li>
                                                <label>
                                                    <input type="checkbox"
                                                        class=" case"
                                                        name="permission[]"
                                                        value="<?php echo e($val->id); ?>" <?php echo e($user->permissions->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                                                    ><strong> <?php echo e($val->name); ?></strong>
                                                </label>
                                                </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Asignar Permisos<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->
</div>
    <!-- end row-->
<?php $__env->startPush('scripts'); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/permisos/edit.blade.php ENDPATH**/ ?>