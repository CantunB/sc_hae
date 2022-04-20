<?php echo csrf_field(); ?>
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre(s)</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name') ?: $coordination->name); ?>">
            <?php if($errors->has('name')): ?>
                <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug') ?: $coordination->slug); ?>">
            <?php if($errors->has('slug')): ?>
                <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
            <?php endif; ?>
        </div>
    </div>

    <h5>Lista de departamentos</h5>
    <div class="form-group">
        <ul class="list-unstyled">
            <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <label>
                        <input type="checkbox"
                               name="departments[]"
                               value="<?php echo e($val->id); ?>" <?php echo e($coordination->departments->pluck('id')->contains($val->id) ? 'checked' : ''); ?>

                        > <?php echo e($val->name); ?>

                        <em><strong>( <?php echo e($val->slug ?: 'N/A'); ?> )</strong></em>
                    </label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
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

<?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/coordinaciones/partials/form.blade.php ENDPATH**/ ?>