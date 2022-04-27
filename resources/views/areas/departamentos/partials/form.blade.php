@csrf
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $department->name }}">
            @if ($errors->has('name'))
                <p style="color:red">  {{$errors->first('name')}} </p>
            @endif
        </div>

        <div class="form-group col-md-4">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') ?: $department->slug}}">
            @if ($errors->has('slug'))
                <p style="color:red">  {{$errors->first('slug')}} </p>
            @endif
        </div>

    </div>
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success waves-effect waves-light">
            {{ $btnText }}<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
        </button>
        <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
        </a>
    </div>
</div>
