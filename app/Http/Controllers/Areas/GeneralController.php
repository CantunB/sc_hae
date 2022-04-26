<?php

namespace HAE\Http\Controllers\Areas;

use HAE\AssignedAreas;
use HAE\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GeneralController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $areas = AssignedAreas::select(['id','department_id', 'coordination_id','slug'])->groupBy('coordination_id');
           // $coordinations = Coordination::select(['id', 'name', 'slug', 'created_at', 'updated_at']);
            return Datatables::of($areas)
                ->rawColumns(['action','department_id'])
                ->editColumn('coordination_id', function($areas) {
               // $coordination = AssignedAreas::select(['coordination_id'])->groupBy('coordination_id')->get();
                return $areas->coordinations->name;
                })
            ->editColumn('department_id', function($areas) {
                $departments = AssignedAreas::with('departments')->select('department_id')
                    ->where('coordination_id',$areas->coordinations->id)
                    ->get();
                foreach ($departments as $key => $department){
                    $department = $department->departments->name;
                }
                $department = '<ul>';
                    for ($i=0; $i<count($departments); $i++){
                        $department .= '<li>'.$departments[$i]->departments->name.'</li>';
                    }
                $department .= '</ul>';
                return $department;
        })
            ->addColumn('action', function ($areas) {
                return '
                    <a href="' . route('coordinaciones.edit', $areas->id) . '"
                    class="btn btn-sm btn-warning"
                    title="Editar" >
                    <i class="fas fa-pencil-alt "></i>
                    </a>';
            })
            ->make(true);
            }
        return view('coordinaciones.areas');
    }

    public function edit($area)
    {

         $area = AssignedAreas::findOrFail($area);
        return view('coordinaciones.areasedit', compact('area'));
        //  $departments = Department::pluck('name', 'id');
    }

    public function update(Request $request, $area)
    {
        $area = AssignedAreas::findOrFail($area);
        $area->update($request->all());
        return redirect()->route('areas.index')->with('update', 'Departamento Actualizado');
    }
}
