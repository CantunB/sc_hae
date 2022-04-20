<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">AUTORIZACIÓN</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style="text-transform:uppercase;" class="header-title"><strong> Oden de compra No. <?php echo e($purchaseorder->detail->order_folio); ?></strong></h1>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="<?php echo e(url()->previous()); ?>"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar
                            </a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="container">
                    <div class="card-body">
                                        <form  action="<?php echo e(route('autorizadas.update', $purchaseorder->id)); ?>" class="form-group" method="POST"   enctype="multipart/form-data">
                                            <?php echo method_field('PUT'); ?>
                                            <?php echo csrf_field(); ?>
                                                <input type="file" name="order_file[]" data-plugins="dropify" data-height="300" multiple/>
                                                <input type="text" class="form-control" name="purchase_id"  hidden value="<?php echo e($purchaseorder->id); ?>">
                                                <input type="text" class="form-control" name="department_id" hidden value="<?php echo e($purchaseorder->department_id); ?>">
                                                <!--<input type="file" class="custom-file-input" name="order_file[]" id="order_file" multiple>
                                                <label class="custom-file-label" for="inputGroupFile01"></label>-->

                                                <div class="form-group col-md-12 table-responsive-md" id="table">
                                                    <table id="form-table"  class="table thead-light table-hover table-sm" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center;"> <i>ARCHIVOS</i></th>
                                                        </tr>
                                                        </thead class="field_wrapper">
                                                            <tbody>
                                                                <tr>
                                                                <td><div class="filename"></div></td>
                                                                </tr>
                                                            </tbody>
                                                        </thead>
                                                    </table>
                                                </div>

                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                                        Guardar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                                    </button>
                                                    <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                                        Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                                    </a>
                                                </div>
                                        </form>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<?php $__env->startPush('scripts'); ?>

<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var invoice_file = e.target.files[0].name;
        $('.custom-file-label').html(invoice_file);
    });

            $("input:file").change(function () {
    var filenames = '';
    for (var i = 0; i < this.files.length; i++) {
        filenames += '<li style="color: Dodgerblue; ">'+ '<span >'+ '<i class="fas fa-file-invoice-dollar fa-lg" ></i> ' + this.files[i].name + '</span>'+'</li>'+'<br>';
    }
    $(".filename").html('<ul>'+ filenames +'</ul>');});
</script>
<script>
    document.getElementById("file").onchange = function(e) {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function(){
            let preview = document.getElementById('preview'),
                image = document.createElement('img');

            image.src = reader.result;

            preview.innerHTML = '';
            preview.append(image);
        };
    }
    </script>
<script>
  const fileSelector = document.getElementById('invoice_file');
  fileSelector.addEventListener('change', (event) => {
    const fileList = event.target.files;
    console.log(fileList);
  });
</script>
<script>
    const imagePreview = document.getElementById('img-preview');
    const imageUploader = document.getElementById('img-uploader');
    const imageUploadbar = document.getElementById('img-upload-bar');

    const CLOUDINARY_URL = ``
    const CLOUDINARY_UPLOAD_PRESET = '';

    imageUploader.addEventListener('change', async (e) => {
        // console.log(e);
        const file = e.target.files[0];
        const formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);

        // Send to cloudianry
        const res = await axios.post(
            CLOUDINARY_URL,
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress (e) {
                    let progress = Math.round((e.loaded * 100.0) / e.total);
                    console.log(progress);
                    imageUploadbar.setAttribute('value', progress);
                }
            }
        );
        console.log(res);
        imagePreview.src = res.data.secure_url;
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/compras/autorizadas/edit.blade.php ENDPATH**/ ?>