@csrf
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre(s)</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $coordination->name }}">
            @if ($errors->has('name'))
                <p style="color:red">  {{$errors->first('name')}} </p>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') ?: $coordination->slug}}">
            @if ($errors->has('slug'))
                <p style="color:red">  {{$errors->first('slug')}} </p>
            @endif
        </div>
    </div>

    <h5>Lista de departamentos</h5>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach ($deps as $item => $val )
                <li>
                    <label>
                        <input type="checkbox"
                               name="departments[]"
                               value="{{ $val->id  }}" {{ $coordination->departments->pluck('id')->contains($val->id) ? 'checked' : '' }}
                        > {{ $val->name  }}
                        <em><strong>( {{ $val->slug ?: 'N/A'}} )</strong></em>
                    </label>
                </li>
            @endforeach
        </ul>
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

