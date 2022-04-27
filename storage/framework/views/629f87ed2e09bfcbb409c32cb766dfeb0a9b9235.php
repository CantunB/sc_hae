<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA DEPENDENCIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_dependency" action="<?php echo e(route('dependencias.store')); ?> " method="POST" autocomplete="off">
            <div class="modal-body">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="">Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                            <?php if($errors->has('name')): ?>
                                <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug')); ?>">
                            <?php if($errors->has('slug')): ?>
                                <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Telefono</label>
                            <input type="text" name="telephone_dependency" class="form-control" value="<?php echo e(old('telephone_dependency')); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Correo</label>
                            <input type="text" name="email_dependency" class="form-control" value="<?php echo e(old('email_dependency')); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Colonia</label>
                            <input type="text" name="colony_dependency" class="form-control" value="<?php echo e(old('colony_dependency')); ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Direccion</label>
                            <input type="text" name="address_dependency" class="form-control" value="<?php echo e(old('address_dependency')); ?>">
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
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/areas/dependencias/partials/new_modal.blade.php ENDPATH**/ ?>