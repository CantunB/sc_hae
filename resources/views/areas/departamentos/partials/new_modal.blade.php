<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVO DEPARTAMENTO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_departamentos" action="{{route('departamentos.store')}} " method="POST" autocomplete="off">
            <div class="modal-body">
                @csrf
                @method('POST')
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Nombre(s)</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')}}">
                            @if ($errors->has('name'))
                                <p style="color:red">  {{$errors->first('name')}} </p>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug')}}">
                            @if ($errors->has('slug'))
                                <p style="color:red">  {{$errors->first('slug')}} </p>
                            @endif
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
