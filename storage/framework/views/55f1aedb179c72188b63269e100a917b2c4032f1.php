<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Nuevo Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form-create" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Nombre o razon social</label>
                                <input required type="text" class="form-control" id="name" name="name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rfc" class="control-label">RFC</label>
                                <input required type="text" class="form-control" id="rfc" name="rfc">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo electronico:</label>
                                <input required type="email" class="form-control" name="email" id="email" placeholder="example@email.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefono:</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="98123123444">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Direccion:</label>
                                <input required type="text" class="form-control" name="address" id="address" placeholder="Calle 12 x 13 A Direcc">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website">Sitio Web:</label>
                        <input type="text" class="form-control" name="website" id="website" placeholder="example.com">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="provider_file">Logotipo:</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="provider_file" id="provider_file" class="custom-file-input">
                                <label class="custom-file-label" for="provider_file">Elegir un archivo</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="registrar" type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/proveedores/partials/create.blade.php ENDPATH**/ ?>