<?php echo csrf_field(); ?>
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre(s)</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name') ?: $department->name); ?>">
            <?php if($errors->has('name')): ?>
                <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
            <?php endif; ?>
        </div>

        <div class="form-group col-md-4">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug') ?: $department->slug); ?>">
            <?php if($errors->has('slug')): ?>
                <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
            <?php endif; ?>
        </div>

    </div>
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success waves-effect waves-light">
            <?php echo e($btnText); ?><span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
        </button>
        <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
        </a>
    </div>
</div>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/departamentos/partials/form.blade.php ENDPATH**/ ?>