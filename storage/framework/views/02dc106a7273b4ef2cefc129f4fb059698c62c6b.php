<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">PROVEEDORES</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">PROVEEDORES</h4>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
<!-- <form class="form-inline">
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">Sort By</label>
                            <select class="custom-select" id="status-select">
                                <option>Select</option>
                                <option>Date</option>
                                <option selected>Name</option>
                                <option>Revenue</option>
                                <option>Employees</option>
                            </select>
                        </div>
                    </form> -->
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_proveedores')): ?>
                        <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus mr-1"></i>Nuevo Proveedor</button>
                        <?php endif; ?>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
<!-- end row -->

<div class="row">
    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4">
        <div class="card-box bg-pattern">
            <div class="text-center">
                <img src="<?php echo e(asset('assets/images/companies/'.$u->provider_file)); ?>" alt="logo" class="avatar-xl rounded-circle mb-3">
                <h4 class="mb-1 font-20"><?php echo e($u->name); ?></h4>
                <p class="text-muted  font-14"><?php echo e($u->rfc); ?></p>
            </div>

            <p class="font-14 text-center text-muted">
               Direccion: <?php echo e($u->address); ?>

            </p>
            <p class="font-14 text-center text-muted">
               Telefono: <?php echo e($u->phone); ?>

            </p>
            <p class="font-24 text-center text-muted">
             <a href="<?php echo e($u->website); ?>" target="_blank" rel="noopener noreferrer"><i class="mdi mdi-web"></i></a>
            </p>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_proveedores')): ?>
            <div class="text-center">
                <a href="<?php echo e(route('proveedores.edit',$u->id)); ?>" class="btn btn-sm btn-info">Detalles</a>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-6">
                    <h5 class="font-weight-normal text-muted">No.Cotizaciones</h5>
                    <h4><?php echo e($u->CountCot($u->id)); ?></h4>
                </div>
                <div class="col-6">
                    <h5 class="font-weight-normal text-muted">No.Compras</h5>
                    <h4><?php echo e($u->CountCom($u->id)); ?></h4>
                </div>
            </div>
            <?php endif; ?>
        </div> <!-- end card-box -->
    </div><!-- end col -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!-- end row -->
<?php echo $__env->make('proveedores.partials.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
        $('#form-create').parsley();
</script>
<script>
    $(document).ready(function () {
        var formulario = $("#form-create");
        $("#registrar").on("click", function () {
            var url = "<?php echo route('proveedores.store'); ?>";
                $.ajax({
                type: "POST",
                url: url,
                data: formulario.serialize(),
                success: function (result) {
                    //alert('Documento Listo');
                    location.reload();
                }});
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/proveedores/index.blade.php ENDPATH**/ ?>