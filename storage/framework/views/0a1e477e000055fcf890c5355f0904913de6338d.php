<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COTIZACIONES</a></li>
                    <li class="breadcrumb-item active">CREAR</li>
                </ol>
            </div>
            <h4 class="page-title">Subir Cotización de Requisición No.<?php echo e($requisition->requisition->folio); ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
                    <form action="<?php echo e(action('QuotesrequisitionsController@store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="form-control" name="requisition_id" value="<?php echo e($requisition->requisition->id); ?>">
                        <input type="hidden" class="form-control" name="department_id" value="<?php echo e($requisition->requisition->department_id); ?>">
                        <div class="row contenedor">
                            <div class="form-group col-md-4">
                                <label for="inputState">Proveedor #1</label>
                                <select id="prov1"  name="provider_id[]" class="form-control " required>
                                    <option disabled selected value="null">Selecciona un proveedor</option>
                                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option   data-name="<?php echo e($prov->address); ?>" data-rfc="<?php echo e($prov->rfc); ?>" value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('prov_id_one')): ?>
                                    <p style="color:red"> <strong> <?php echo e($errors->first('prov_id_one')); ?></strong> </p>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">RFC</label>
                                    <div>
                                        <input type="text" class="form-control" id="prov_rfc" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Direccion</label>
                                    <div>
                                        <textarea type="text" rows="2" class="form-control" id="prov_address" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Cotización</label>
                                    <div class="custom-file">
                                        <input type="file" class="dropify" id="file1" name="quote_file[]" data-max-file-size="3M" required/>
                                        <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                                        <?php if($errors->has('prov_one_img')): ?>
                                            <p style="color:red"> <strong><?php echo e($errors->first('prov_one_img')); ?></strong> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Proveedor #2</label>
                                <select id="prov2" name="provider_id[]" class="form-control sel">
                                    <option disabled selected>Selecciona un proveedor</option>
                                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-name2="<?php echo e($prov->address); ?>"  data-rfc2="<?php echo e($prov->rfc); ?>"  value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">RFC</label>
                                    <div>
                                        <input type="text" class="form-control" id="prov2_rfc" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Direccion</label>
                                    <div>
                                        <textarea type="text" rows="2" class="form-control" id="prov2_address" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Cotización</label>
                                    <div class="custom-file">
                                        <input type="file" class="dropify" id="file2" name="quote_file[]" data-max-file-size="3M" />
                                        <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Proveedor #3</label>
                                <select id="prov3" name="provider_id[]" class="form-control sel">
                                    <option  disabled selected>Selecciona un proveedor</option>
                                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-name3="<?php echo e($prov->address); ?>"  data-rfc3="<?php echo e($prov->rfc); ?>"  value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">RFC</label>
                                    <div>
                                        <input type="text"  class="form-control" id="prov3_rfc" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Direccion</label>
                                    <div>
                                        <textarea type="text" rows="2" class="form-control" id="prov3_address" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-form-label">Cotización</label>
                                        <input type="file" class="dropify" id="file3" name="quote_file[]" data-max-file-size="3M" />
                                        <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $('.file-input1').on('change',function(){
        var fileName = document.getElementById("file1").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
    })

    $('.file-input2').on('change',function(){
        var fileName = document.getElementById("file2").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
    })

    $('.file-input3').on('change',function(){
        var fileName = document.getElementById("file3").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
    })
</script>
<script>
    const $contenedor = $('.contenedor');
    const $selects = $contenedor.find('select');
    const $options = $contenedor.find('select option');

    const data = $options.toArray().reduce((obj, option) => (option.value && (obj[option.value] = obj[option.value] || option.selected), obj), {});

    function updateData() {
        Object.keys(data).forEach(value => data[value] = false);
        $selects.each((index, el) => (el.value !== "" && (data[el.value] = true)));
    };

    $contenedor.on('change', 'select', () => {
        updateData();
        $options.each((index, el) => (el.value !== "" && !el.selected && (el.disabled = data[el.value]), true));
    });
</script>
<script type="text/javascript">
    $('#prov1').on('change', function () {
        var name = $(this).children('option:selected').data('name');
        var rfc = $(this).children('option:selected').data('rfc');
        $('#prov_address').val(name);
        $('#prov_rfc').val(rfc);
    });
    $('#prov2').on('change', function () {
        var name = $(this).children('option:selected').data('name2');
        var rfc = $(this).children('option:selected').data('rfc2');
        $('#prov2_address').val(name);
        $('#prov2_rfc').val(rfc);
    });
    $('#prov3').on('change', function () {
        var name = $(this).children('option:selected').data('name3');
        var rfc = $(this).children('option:selected').data('rfc3');
        $('#prov3_address').val(name);
        $('#prov3_rfc').val(rfc);
    });
</script>
<script>
    $('.dropify').dropify();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/cotizaciones/create.blade.php ENDPATH**/ ?>