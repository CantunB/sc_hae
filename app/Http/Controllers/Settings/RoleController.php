<?php

namespace HAE\Http\Controllers\Settings;

use HAE\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_roles')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_roles')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_roles')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_roles')->only(['destroy']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::select(['id','name','created_at','updated_at']);
            return Datatables::of($roles)
            ->addColumn('action', function ($roles) {
                return '
                <a href="' . route('roles.edit', $roles->id) . '"
                data-id="'.$roles->id.'"
                 class="btn btn-sm btn-warning"
                 title="Editar" >
                 <i class="fas fa-pencil-alt "></i>
                 </a>

                <a href="' . route('roles.destroy', $roles->id) . '"
                data-id="'.$roles->id.'"
                class="btn btn-sm btn-danger"
                title="Eliminar"
                data-toggle="modal"
                data-target="#confirm-delete">
                <i class="fas fa-trash-alt"></i>
                </a>';
            })
            ->make(true);
            }
        return view('settings.roles.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        //$permissions = Permission::pluck('name', 'id');
        return view('settings.roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $roles = Role::create($request->all());
        $roles->permissions()->sync($request->get('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role Creado Correctamente');
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
        $roles = Role::findOrFail($id);
        $permisos = Permission::all();

        return view('settings.roles.edit', compact('roles','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        $role->permissions()->sync($request->get('permission'));

        return redirect()->route('roles.index', $role->id)->with('update','Role actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
