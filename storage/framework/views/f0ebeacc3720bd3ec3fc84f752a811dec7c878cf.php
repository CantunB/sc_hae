<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA COORDINACIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_coordination" action="<?php echo e(route('coordinaciones.store')); ?> " method="POST" autocomplete="off">
            <div class="modal-body">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Dependencia</label>
                            
                            <select class="form-control select2" name="dependency_id">
                                <option value="" selected disabled >Selecciona una dependencia</option>
                                <?php $__currentLoopData = $dependencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $dependency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=" <?php echo e($dependency->id); ?> "> <?php echo e($dependency->fullname); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('name')): ?>
                                <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                            <?php if($errors->has('name')): ?>
                                <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug')); ?>">
                            <?php if($errors->has('slug')): ?>
                                <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
        </div>
        </form>
        </div>
    </div>
</div>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/areas/coordinaciones/partials/new_modal.blade.php ENDPATH**/ ?>