<?php $__env->startSection('content'); ?>
<!-- start page title -->
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
<?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('subtitle'); ?> usuarios <?php $__env->endSlot(); ?>
<?php $__env->slot('teme'); ?> actualizar <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Configuración
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form id="form" method="POST" action="<?php echo e(route('usuarios.update', $user->id)); ?>" class="form-group">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Informacion Personal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre completo</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e($user->name); ?>" required>
                                    <?php $__errorArgs = ['name'];
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NoEmpleado">No. Empleado</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="NoEmpleado" name="NoEmpleado" value="<?php echo e($user->NoEmpleado); ?>" required>
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
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_seg_soc">No. Seguro Social</label>
                                    <input type="text" class="form-control" id="no_seg_soc" name="no_seg_soc" value="<?php echo e($user->no_seg_soc); ?>">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userbio">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo e($user->categoria); ?>">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nivel">Nivel</label>
                                    <input type="text" class="form-control" id="nivel" name="nivel" value="<?php echo e($user->nivel); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo e($user->rfc); ?>">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" value="<?php echo e($user->curp); ?>">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_nacimiento">Fecha Nacimiento</label>
                                    <input type="text" class="form-control" id="fe_nacimiento" name="fe_nacimiento" value="<?php echo e($user->fe_nacimiento); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_ingreso">Fecha Ingreso</label>
                                    <input type="text" class="form-control" id="fe_ingreso" name="fe_ingreso" value="<?php echo e($user->fe_ingreso); ?>">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input required stype="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e($user->email); ?>" autocomplete="off">
                                    <?php $__errorArgs = ['email'];
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
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="text-muted mt-3 mb-12">Lista de roles</p>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="radio radio-info form-check-inline">
                                            <input type="radio" id="roles" name="roles[]" value="<?php echo e($id); ?>" <?php echo e($user->roles->pluck('id')->contains($id) ? 'checked' : ''); ?> >
                                            <label for="roles"><?php echo e($rol); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Registrar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                </button>
                                <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                    Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
<!-- end row-->
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function () {
    $('#coordinacion').on('change',function(e) {
        var coordinacion = e.target.value;
        $.ajax({
        url:"<?php echo e(route('coordinaciones.getDepartments')); ?>",
        type:"POST",
        data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                'coordinacion': coordinacion
            },
            success:function (data) {
                $('#departamento').empty();
                $.each(data.departments,function(i, val){
                $('#departamento').append('<option value="'+data.departments[i].departments['id']+'">'+data.departments[i].departments['name']+'</option>');
                })
            },
                error: function( error )
                {
                    alert( error );
                }
            })
        });
        });
</script>
<script>
    $('#form').parsley();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/settings/users/edit.blade.php ENDPATH**/ ?>