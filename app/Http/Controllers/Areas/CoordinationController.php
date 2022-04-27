<?php

namespace HAE\Http\Controllers\Areas;

use HAE\Http\Controllers\Controller;
use HAE\Coordination;
use HAE\Department;
use HAE\AssignedAreas;
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
        return view('areas.coordinaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deps = Department::all();
        return view('areas.coordinaciones.create', compact('deps'));
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
     //   return  $request->all();
        $coordinations = Coordination::create($request->all());
        // $coordinations->departments()->sync( $request->get('departments') );
      //  $coordinations->save();
        return response()->json(['data' => 'Nueva coordinacion'], 201);
        // return redirect()->route('coordinaciones.index')->with('success','Coordinacion Creada');
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
    public function edit( $coordination)
    {
        $coordination = Coordination::findorFail($coordination);
        $c_id = AssignedAreas::distinct()->get(['coordination_id']);
        $array = array();
        foreach($c_id as $c){
            $array[] = $c->coordination_id;
        }
   //     return  $array;
        if($coordination->id != $array)
        {
           // $departments = Department::where('id','!=', $array->department_id);
        }
        else
        {
         return   $departments = Department::
            join('assigned_areas', 'assigned_areas.department_id','=','departments.id')
                ->where('assigned_areas.coordination_id','=',$coordination->id)
                ->get();
        }
          //return $departments = Department::
            //join('assigned_areas', 'assigned_areas.department_id','=','departments.id')
            //->join('coordinations','coordinations.id','=','assigned_areas.coordination_id')
           // ->select('name')
           // ->where('assigned_areas.coordination_id','=',$coordination->id)
            //->pluck('name', 'id')
             // ->get();
           //$dep_asignados = AssignedAreas::all();
        /*
         *
         *
          $departments_asignados = AssignedAreas::
            join('departments','departments.id', '=', 'assigned_areas.department_id')
            ->join('coordinations','coordinations.id','=','assigned_areas.coordination_id')
            ->where('coordination_id','=',$coordination->id)
            ->get();
        $key = $departments_asignados->modelKeys();
        return   $departments = Department::where('id','!=', $key)->pluck('name', 'id');


         **/


        ///$departments = Department::pluck('name', 'id');
        $deps = Department::all();
        return view('areas.coordinaciones.edit', compact('coordination','deps'));
    }

    function getDepartments(Request $request)
    {
        $coordination = $request->coordinacion;
      //  return $departments = Coordination::getDepartments($coordination);
        $departments = AssignedAreas::with('departments')->select('department_id')
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
