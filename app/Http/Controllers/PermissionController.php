<?php

namespace HAE\Http\Controllers;

use Illuminate\Http\Request;
use HAE\Http\Requests\PermissionRequest;
use HAE\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Jenssegers\Date\Date;



class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_permisos')->only(['create','store']);
        $this->middleware('role_or_permission:read_permisos')->only(['index','show']);
        $this->middleware('role_or_permission:update_permisos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_permisos')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id','NoEmpleado','name']);
                return DataTables::of($users)
                 ->addColumn('action', function ($user) {
                    $actions = '';
                    $auth = Auth::user();
                    if ($auth->can('read_permisos')) {
                           return $actions .= '<a href="'. route('permisos.edit',$user->id ) .'"
                           class="btn btn-outline-info waves-effect waves-light"
                            title="">
                            <i class="mdi mdi-lock-check
                            "></i>
                            </a>';

                    }
                    return $actions;
                })
                ->make(true);
        }
        return view('permisos.index');
    }

    public function anyData()
    {
      return Datatables::of(Permission::query())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permisos = new Permission();
        foreach ($request->name as $item=>$v) {
            $data2=array(
                'name' => $request->name[$item],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            );
            //    return $requesteds = $data2;
            $permisos = Permission::insert($data2);
        }
        return redirect()->route('permisos.index')->with('success','Permiso(s) Creado(s)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=  User::findOrFail($id);
        $permisos = Permission::all();
        return view('permisos.edit', compact('user','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncPermissions($request->get('permission'));

        return redirect()->route('permisos.index')->with('update','Permisos asignados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisos = Permission::findOrFail($id);
        $permisos->delete();
        return back()->with('destroy','Permiso Eliminado');
    }
}
