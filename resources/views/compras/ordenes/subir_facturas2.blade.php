@extends('layouts.CoreUi.index')
@section('title', 'Subir Facturas de la Orden de Compra ')
@section('button')
    <label style="color: black">{{$purchaseorder->detail->order_folio}}</label>
    <a class="btn btn btn-outline-danger float-right" href="{{ url()->previous() }}">
        <i class="fas fa-times-circle" ></i> Regresar</a>
@endsection
@section('contenido')
  <form
   {{-- action="{{route('ordenes.factura_upload', $purchaseorder->id)}}" --}}
    class="form-group" enctype="multipart/form-data">
      <div class="container">
          <div id="respuesta" class="alert"></div>
          <form action="javascript:void(0);">
{{--

              <div class="row">
                <div class="col-md-6">
                  <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fa fa-file"></i></span>
                          <div class="custom-file">
                              <input type="text" class="form-control" name="purchase_id"  hidden value="{{$purchaseorder->id}}">
                              <input type="text" class="form-control" name="department_id" hidden value="{{$purchaseorder->department_id}}">
                              <input type="file" class="custom-file-input" name="archivo[]" id="archivo" multiple>
                              <label class="custom-file-label" for="inputGroupFile01"></label>

                          </div>
                      </div>
                      <br>
                    </div>
              </div> --}}
              <div class="row">
                <div class="col-sm-2">
                    <label> <strong>Nombre el archivo:</strong> </label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="nombre_archivo" id="nombre_archivo" />
                </div>
                <div class="col-sm-2">
                  <div class="custom-file">
                    <input class="" type="file" name="archivo" id="archivo" />
                  </div>
                </div>
                {{-- <div class="custom-file">
<input type="file" class="custom-file-input" id="customFileLangHTML">
<label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen">Voeg je document toe</label>
</div> --}}
              </div>
              <hr />
              <div class="row">
                  <div class="col-lg-2">
                      <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
                  </div>
                  <div class="col-lg-4">
                      <progress id="barra_de_progreso" value="0" max="100"></progress>
                  </div>
              </div>
          </form>
          <hr />
          <div id="archivos_subidos"></div>
      </div>
    </form>
<script src="{{ asset('js/upload/jquery-2.0.2.js') }}"></script>
<script src="{{ asset('js/upload/upload.js') }}"></script>
<script src="{{ asset('js/upload/bootstrap.min.js') }}"></script>
<script type="text/javascript">
function subirArchivos() {
    $("#archivo").upload('',
    {
        nombre_archivo: $("#nombre_archivo").val()
    },
    function(respuesta) {
        //Subida finalizada.
        $("#barra_de_progreso").val(0);
        if (respuesta === 1) {
            mostrarRespuesta('El archivo ha sido subido correctamente.', true);
            $("#nombre_archivo, #archivo").val('');
        } else {
            mostrarRespuesta('El archivo NO se ha podido subir.', false);
        }
        mostrarArchivos();
    }, function(progreso, valor) {
        //Barra de progreso.
        $("#barra_de_progreso").val(valor);
    });
}
function eliminarArchivos(archivo) {
    $.ajax({
        url: '{{ asset('js/upload/eliminar_archivo.php') }}',
        type: 'POST',
        timeout: 10000,
        data: {archivo: archivo},
        error: function() {
            mostrarRespuesta('Error al intentar eliminar el archivo.', false);
        },
        success: function(respuesta) {
            if (respuesta == 1) {
                mostrarRespuesta('El archivo ha sido eliminado.', true);
            } else {
                mostrarRespuesta('Error al intentar eliminar el archivo.', false);
            }
            mostrarArchivos();
        }
    });
}
function mostrarArchivos() {
    $.ajax({
        url: '{{ asset('js/upload/mostrar_archivos.php') }}',
        dataType: 'JSON',
        success: function(respuesta) {
            if (respuesta) {
                var html = '';
                for (var i = 0; i < respuesta.length; i++) {
                    if (respuesta[i] != undefined) {
                        html += '<div class="row"> <span class="col-lg-2"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                    }
                }
                $("#archivos_subidos").html(html);
            }
        }
    });
}
function mostrarRespuesta(mensaje, ok){
    $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
    if(ok){
        $("#respuesta").addClass('alert-success');
    }else{
        $("#respuesta").addClass('alert-danger');
    }
}
$(document).ready(function() {
    mostrarArchivos();
    $("#boton_subir").on('click', function() {
        subirArchivos();
    });
    $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
        var archivo = $(this).parents('.row').eq(0).find('span').text();
        archivo = $.trim(archivo);
        eliminarArchivos(archivo);
    });
});
</script>
@endsection
