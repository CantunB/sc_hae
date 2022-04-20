@extends('layouts.CoreUi.index')
@section('title', 'Subir Facturas')
@section('button')

    <label style="color: black">{{$purchaseorder->detail->order_folio}}</label>
    <a class="btn btn btn-outline-danger float-right" href="{{ url()->previous() }}">
        <i class="fas fa-times-circle" ></i> Regresar</a>
@endsection
@section('contenido')

    <style>
        .file {
            position: relative;
            top: 100px;
            background: linear-gradient(to right, lightblue 50%, transparent 50%);
            background-size: 200% 100%;
            background-position: left bottom;
            transition:all 1s ease;
        }
        .file.done {
            background: lightgreen;
        }
        .file a {
            display: block;
            position: relative;
            padding: 5px;
            color: black;
        }
        html, body {
    padding: 0;
    margin: 0;
    height: 100vh;
}

    </style>
    <form action="{{route('ordenes.factura_upload', $purchaseorder->id)}}" class="form-group" method="POST"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group input-group col-md-12">
            <div class="row justify-content-start table-responsive-md">
                <table class="table table-hover table-sm"  style="width:100%">
                    <thead>
                    <tr style="text-align:center">
                        <th>SELECCCIONAR LOS ARCHIVOS</th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <td>
                      <div class="col-md-12 input-group-prepend">
                            <span class="input-group-text" >Selecciona la(s) factura(s)
                              {{-- <i class="fa fa-file"> </i> --}}
                            </span>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="purchase_id"  hidden value="{{$purchaseorder->id}}">
                                <input type="text" class="form-control" name="department_id" hidden value="{{$purchaseorder->department_id}}">
                                <input type="file" class="custom-file-input" name="invoice_file[]" id="invoice_file" multiple>
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                            </div>
                        </div>
                        {{-- <progress id="img-upload-bar" value="0" max="100" style="width: 100%"></progress> --}}
                    </td>
                    </tbody>
                </table>
            </div>
            <div class="form-group col-md-12 table-responsive-md" id="table">
                <table id="myTable" name="table" class="table table-hover table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align: center;"> <i>FACTURAS</i></th>
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
        </div>
        {{-- <div class="form-group col-md-4">
            @if ($errors->has('img_req'))
                <p style="color:red">  {{$errors->first('img_req')}} </p>
            @endif
        </div> --}}

        <a class="btn btn-outline-danger float-right" style="margin: 10px" href="{{ url()->previous() }}">
            <i class="fas fa-times-circle">
            </i>
            Cancelar
        </a>
        <button class="btn btn-success float-right" style="margin: 10px" type="submit">
            <i class="fas fa-check-circle">
            </i>
            Subir
        </button>
    </form>


    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
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
    $(".filename").html('<ul>' + filenames +
    '</ul>');
});
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
    <script type="text/javascript">
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);
        }

    </script>
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
@endsection
