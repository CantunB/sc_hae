@csrf
<div class="container">
    {{-- <label class="col-md-2 col-form-label">Crear Permisos</label> --}}
    <div class="card col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th><button type="button" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></th>
            </tr>
            </thead>
            <tbody class="field_wrapper">
            <input class="form-control col-md-2" type="text" name="cont" id="cont" hidden>
            <tr>
                <td>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name[]" value="{{ old('name') ?: $permiso->name}}" required autocomplete="name" autofocus>
     <!--             <input type="text" name="name[]" class="form-control" placeholder="Listar permisos" required></td> -->
                @error('name')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td>
            </tr>
            </tbody>

        </table>
<div class="container">
    <a href="{{ url()->previous() }}"  style="margin: 10px"class="btn btn-outline-danger float-right"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
    <button type="submit"  style="margin: 10px"class="btn btn-primary float-right"><i class="fas fa-check"></i> {{ $btnText}}</button>
</div>
        <br>
    </div>

</div>
<br>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 20; //Limitación de incremento de campos de entrada
        var addButton = $('.add_button'); //Agregar selector de botones
        var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
        var fieldHTML = '<tr>'+
            '<td><input type="text" name="name[]" class="form-control"></td>'+
            '<td><button type="button" class="remove_button btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td></tr>';

        var x = 1; //El contador de campo inicial es 1
        document.getElementById("cont").value = x;
        //Una vez que se hace clic en el botón Agregar

        $(addButton).click(function(){
            //Verifique el número máximo de campos de entrada
            if(x < maxField){
                x++; //Contador de campo de incremento
                $(wrapper).append(fieldHTML); //Agregar campo html
                document.getElementById("cont").value = x;
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
            x--;
            document.getElementById("cont").value = x;
        });

    });
</script>
