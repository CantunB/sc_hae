<?php

namespace Smapac\Http\Controllers;

use Smapac\Department;
use Illuminate\Http\Request;
use Smapac\Http\Requests\DepartmentRequest;
use Yajra\Datatables\Datatables;
class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_departamentos')->only(['create','store']);
        $this->middleware('role_or_permission:read_departamentos')->only(['index','show']);
        $this->middleware('role_or_permission:update_departamentos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_departamentos')->only(['destroy']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::select(['id', 'name', 'slug', 'created_at', 'updated_at']);
            return Datatables::of($departments)
            ->addColumn('action', function ($departments) {
                return '
                <a href="' . route('departamentos.edit', $departments->id) . '"
                data-id="'.$departments->id.'"
                 class="btn btn-sm btn-warning"
                 title="Editar" >
                 <i class="fas fa-pencil-alt "></i>
                 </a>

                <a href="' . route('departamentos.destroy', $departments->id) . '"
                data-id="'.$departments->id.'"
                class="btn btn-sm btn-danger"
                title="Eliminar"
                data-toggle="modal"
                data-target="#confirm-delete">
                <i class="fas fa-trash-alt"></i>
                </a>';
            })
            ->make(true);
            }

        return view('departamentos.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $departamento = Department::create($request->all());
        //  $coordinations->save();
        //return response()->json(['success'=>'Departamento creado correctamente!']);
        return redirect()->route('departamentos.index')->with('success','Departamento Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Smapac\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Smapac\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
       $department = Department::find($department);
      //  return response()->json($department);
     return view('departamentos.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Smapac\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //return $request->all();
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->route('departamentos.index')->with('update', 'Departamento Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Smapac\Department  $department
     * @return \Illuminate\Http\Response

    public function destroy( $department)
    {
        $department = Department::findOrFail($department);
        $department->delete();
        return back()->with('destroy','Departamento Eliminado');
    }*/
    public function destroy($id)
    {
        Department::find($id)->delete();


        return response()->json(['success'=>'Departamento eliminado!']);
    }
}
