<?php

namespace HAE\Http\Controllers;

use HAE\Storehouse;
use Illuminate\Http\Request;

class StorehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_almacen')->only(['create','store']);
        $this->middleware('role_or_permission:read_almacen')->only(['index','show']);
        $this->middleware('role_or_permission:update_almacen')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_almacen')->only(['destroy']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacen = Storehouse::paginate(15);
        return view('almacen.index',compact('almacen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('almacen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Storehouse();
        foreach ($request->quantity as $item=>$v) {
            $data2=array(
                'quantity' => $request->quantity[$item],
                'unit' => $request->unit[$item],
                'concept' => $request->concept[$item],
                'description' => $request->description[$item],
                'created_at' => now(),
                'updated_at' => now(),
            );
            //    return $requesteds = $data2;
            $permisos[] = Storehouse::insert($data2);
        }
        return redirect()->route('almacen.index')->with('success','Producto creado en el almacen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HAE\Storehouse  $storehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Storehouse $storehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HAE\Storehouse  $storehouse
     * @return \Illuminate\Http\Response
     */
    public function edit( $storehouse)
    {
        $almacen = Storehouse::findOrFail($storehouse);

        return view('almacen.edit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HAE\Storehouse  $storehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $storehouse)
    {
        $almacen  = Storehouse::findOrFail($storehouse);
        $almacen->update($request->all());
        return redirect()->route('almacen.index')->with('update', 'Almacen actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HAE\Storehouse  $storehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($storehouse)
    {
       // return $storehouse;
        $almacen = Storehouse::findOrFail($storehouse);
        $almacen->delete();
        return back()->with('destroy','Producto eliminado del almacen');
    }
}
