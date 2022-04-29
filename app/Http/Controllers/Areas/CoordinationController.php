<?php

namespace HAE\Http\Controllers\Areas;

use HAE\AssignedCoordinations;
use HAE\Http\Controllers\Controller;
use HAE\Coordination;
use HAE\Department;
use HAE\AssignedDepartments;
use HAE\Dependency;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class CoordinationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_coordinaciones')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_coordinaciones')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_coordinaciones')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_coordinaciones')->only(['destroy']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coordinations = Coordination::all();
            return Datatables::of($coordinations)
            ->addIndexColumn()
            ->addColumn('action', function ($coordinations) {
                return '
                <a href="' . route('coordinaciones.edit', $coordinations->id) . '"
                data-id="'.$coordinations->id.'"
                 class="btn btn-sm btn-warning"
                 title="Editar" >
                 <i class="fas fa-pencil-alt "></i>
                 </a>

                <button onclick="btnDelete('.$coordinations->id.')"
                class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                </button>';
            })
            ->make(true);
            }
        $dependencies = Dependency::all();

        return view('areas.coordinaciones.index', compact('dependencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('areas.coordinaciones.create', compact('dependencies'));
        //  $departments = Department::pluck('name', 'id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coordination = Coordination::create($request->all());
        $dependency = Dependency::findOrFail($request->dependency_id);
        $dependency->coordinations()->attach($coordination->id);
        return response()->json(['data' => 'Nueva coordinacion'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \HAE\Coordination  $coordination
     * @return \Illuminate\Http\Response
     */
    public function show(Coordination $coordination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HAE\Coordination  $coordination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordination = Coordination::with(['dependency'])->findorFail($id);
        $departments = Department::all();
        return view('areas.coordinaciones.edit', compact('coordination','departments'));
    }

    function getDepartments(Request $request)
    {
        $coordination = $request->coordinacion;
      //  return $departments = Coordination::getDepartments($coordination);
        $departments = AssignedDepartments::with('departments')->select('department_id')
                  ->where('coordination_id', $coordination)
                  ->orderBy('department_id','ASC')
                  ->get();
        return response()->json([
            'departments' => $departments
        ]);
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
        $coordination = Coordination::findOrFail($id);
        $coordination->update($request->all());
        $coordination->departments()->sync($request->get('departments'));
        return redirect()->route('coordinaciones.index')->with('update', 'Coordinacion Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HAE\Coordination  $coordination
     * @return \Illuminate\Http\Response
     */
    public function destroy($coordination)
    {
        $coordination = Coordination::findOrFail($coordination);
        $co = $coordination->delete();
        if ($co == 1){
            $success = true;
            $message = "Coordinación eliminada";
        } else {
            $success = true;
            $message = "Coordinación no eliminada";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ], 200);
    }

}
