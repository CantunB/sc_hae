<?php

namespace HAE\Http\Controllers\Areas;

use HAE\AssignedAreas;
use HAE\Coordination;
use HAE\Department;
use HAE\Dependency;
use HAE\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class DependencyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dependencias = Dependency::all();
            return Datatables::of($dependencias)
            ->addIndexColumn()
            ->addColumn('options', function ($dependencias){
                $opciones = '';
                    // if (Auth::user()->can('read_operators')){
                        $opciones .= '<button type="button"  onclick="btnInfo('.$dependencias->id.')" class="btn btn-sm action-icon icon-dual-blue"><i class="mdi mdi-dots-horizontal"></i></button>';
                    // }
                    // if (Auth::user()->can('update_operators')){
                        $opciones .= '<a href="'.route('dependencias.edit', $dependencias->id).'" class="btn btn-sm action-icon icon-dual-warning"><i class="mdi mdi-pencil"></i></a>';
                    // }
                    // if (Auth::user()->can('delete_operators')){
                        $opciones .= '<button type="button" onclick="btnDelete('.$dependencias->id.')" class="btn btn-sm action-icon icon-dual-secondary"><i class="mdi mdi-delete-empty"></i></button>';
                    // }
                return $opciones;
            })
            ->rawColumns(['options'])
            ->toJson();
        }
        return view('areas.dependencias.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dependencias = Dependency::create($request->all());
        return response()->json(['data'=>'Departamento creado!'], 200);
    }

    public function edit($id)
    {
        $dependency = Dependency::findorFail($id);
        $coordinations = Coordination::all();
        $departments = Department::all();
        return view('areas.dependencias.edit', compact(
            'dependency',
            'coordinations',
            'departments'
        ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HAE\Coordination  $coordination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dependency = Dependency::findOrFail($id);
        $dependency->update($request->all());
        // $coordination->departments()->sync($request->get('departments'));
        return redirect()->route('dependencias.index')->with('update', 'Coordinacion Actualizada');
    }

}
