<?php

namespace HAE\Http\Controllers\Areas;

use HAE\Coordination;
use HAE\Http\Controllers\Controller;
use HAE\Department;
use Illuminate\Http\Request;
use HAE\Http\Requests\DepartmentRequest;
use Yajra\Datatables\Datatables;
class DepartmentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_departamentos')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_departamentos')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_departamentos')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_departamentos')->only(['destroy']);

    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::all();
            return Datatables::of($departments)
            ->addIndexColumn()
            ->addColumn('action', function ($departments) {
                return '
                <a href="' . route('departamentos.edit', $departments->id) . '"
                data-id="'.$departments->id.'"
                 class="btn btn-sm btn-warning"
                 title="Editar" >
                 <i class="fas fa-pencil-alt "></i>
                 </a>

                <button type="button"
                onclick="btnDelete('.$departments->id.')"
                class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                </button>';
            })
            ->make(true);
            }
        $coordinations = Coordination::all();
        return view('areas.departamentos.index', compact('coordinations') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departament = Department::create($request->all());
        $coordination = Coordination::findOrFail($request->coordination_id);
        $coordination->departments()->attach($departament->id);
        return response()->json(['data'=>'Departamento creado!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \HAE\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HAE\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
       $department = Department::find($department);
      //  return response()->json($department);
     return view('areas.departamentos.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HAE\Department  $department
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
     * @param  \HAE\Department  $department
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        // Department::find($id)->delete();

        $departamento = Department::findOrFail($id);
        $dep = $departamento->delete();
        if ($dep == 1){
            $success = true;
            $message = "Departamento eliminado";
        } else {
            $success = true;
            $message = "Departamento no eliminado";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ], 200);
    }
}
