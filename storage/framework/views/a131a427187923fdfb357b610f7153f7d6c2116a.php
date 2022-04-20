<?php echo csrf_field(); ?>
<input type="hidden" class="form-control" name="requisition_id" value="<?php echo e($requisition->requisition->id); ?>">
<input type="hidden" class="form-control" name="department_id" value="<?php echo e($requisition->requisition->department_id); ?>">
<div class="form-group col-md-4 ">
    <label for="inputState">Proveedor</label>
    <select id="prov1"  name="provider_id" class="form-control sel " required>
        <option disabled selected>Selecciona un proveedor</option>
        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option   data-name="<?php echo e($prov->address); ?>" data-rfc="<?php echo e($prov->rfc); ?>" value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
    <?php if($errors->has('provider_id')): ?>
        <p style="color:red"> <strong> <?php echo e($errors->first('provider_id')); ?></strong> </p>
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
            <input type="text"  class="form-control" id="prov_address" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-form-label">Cotización</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input file-input1" id="file1" name="quote_file" required>
            <label class="custom-file-label form-control-file">Seleccionar un archivo</label>
            <?php if($errors->has('prov_one_img')): ?>
                <p style="color:red"> <strong><?php echo e($errors->first('prov_one_img')); ?></strong> </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>&nbsp; <?php echo e($btnText); ?> </button>
<a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>

<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/app.js')); ?>" ></script>
<script type="text/javascript">
    $('.file-input1').on('change',function(){
        var fileName = document.getElementById("file1").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
    });
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
    </script>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/cotizaciones/partials/form.blade.php ENDPATH**/ ?>