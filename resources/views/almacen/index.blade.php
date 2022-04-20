@extends('layouts.index')
@section('title','Lista de almacen')
@section('button')
{{--    @can('requisitions.create')
--}}
        <a href="{{ route('almacen.create') }}"
           class="btn btn-sm btn-primary float-right">Crear</a>
{{--        @endcan
--}}
        </h6>
@endsection
@section('contenido')
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <th style="text-align: center">Cantidad</th>
            <th style="text-align: center">Unidad</th>
            <th style="text-align: center">Concepto</th>
            <th style="text-align: center">Descripcion</th>
            <th style="text-align: center">Fecha de registro</th>
            <th style="text-align: center" colspan="2">Opciones</th>
            </thead>
            @foreach($almacen as $a)

                <tbody>
                <td style="text-align: center">{{ $a->quantity }}</td>
                <td style="text-align: center">{{ $a->unit }}</td>
                <td style="text-align: center">{{ $a->concept  }}</td>
                <td style="text-align: center">{{ $a->description  }}</td>
                <td style="text-align: center">{{ \Carbon\Carbon::parse($a->updated_at)->format('Y/m/d') }}</td>
              {{--  <td style="text-align: center;width: 10px">
                    <a title="Ver almacen" href="{{route('almacen.show',$a->id)}}"
                       class="btn btn-outline-primary">
                        <i class="fas fa-eye"></i></a>
                    </a>
                </td>--}}
                <td style="text-align: center;width: 10px">
                    @can('update_almacen')
                    <a title="Editar almacen" href="{{route('almacen.edit',$a->id)}}"
                       class="btn btn-outline-dark">
                        <i class="fas fa-pencil-alt"></i></a>
                    </a>
                    @endcan
                </td>
                <td style="text-align: center;width: 10px">
                    @can('delete_almacen')
                    <button title="Eliminar producto" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete">
                        <i class="fas fa-times"></i>
                    @endcan
                </td>


                </tbody>
                <!-- INICIO DEL MODAL-->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Eliminar Producto</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Desea eliminar el producto almacenado?</h5>
                                <p><strong>{{$a->concept  }}: {{$a->description}} </strong></p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                <!-- Inicio btn para eliminar-->
                                <form style="display:inline"
                                      method="POST"
                                      {{--  action="{{ route('users.destroy', $user->id) }}">  --}}
                                      action="{{ route('almacen.destroy', $a->id)  }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-xs" type="submit">Eliminar</button>
                                </form>
                                <!-- Final btn para eliminar-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FINAL DEL MODAL-->
            @endforeach
        </table>
                {{ $almacen->links() }}
    </div>

@endsection
