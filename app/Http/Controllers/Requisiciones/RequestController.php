<?php

namespace HAE\Http\Controllers\Requisiciones;

use HAE\AssignedRequesteds;
use HAE\AssignedRequisition;
use HAE\Coordination;
use HAE\Http\Controllers\Controller;
use HAE\Requested;
use HAE\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_requisicion')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_requisicion')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_requisicion')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_requisicion')->only(['destroy']);

    //     ini_set('max_execution_time', 300);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPermissionTo('update_requisicion')){
                $requisitions = AssignedRequisition::all();
                return view('requisitions.request.index', compact('requisitions'));
            }
        else{
            $requisitions = AssignedRequisition::where('user_id', '=', auth()->user()->id)->paginate(10);
        }
        return view('requisitions.request.list', compact('requisitions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = Auth::user();
            $requisicion = AssignedRequisition::all();
            $coordinaciones = Coordination::all();

            $last = $requisicion->last();
            if($last === null) {
                $requisicion = new Requisition();
                $countreq = $requisicion->accountant = 1;
            }else {
                $countreq = $last->accountant + 1;
            }

        return view('requisitions.request.create',compact('user','countreq', 'coordinaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requisition = Requisition::create($request->all());
        $requesteds = new Requested();
        foreach ($request->departure as $item=>$v) {
            $data2=array(
                'departure' => $request->departure[$item],
                'quantity' => $request->quantity[$item],
                'unit' => $request->unit[$item],
                'concept' => $request->concept[$item],
                'created_at' => now(),
            );
            $requesteds = Requested::insert($data2);
        }
        $registros = Requested::latest()->orderBy('id', 'desc')
            ->take($request->input('cont'))
            ->get();
        foreach($registros as $r)
        {
            $idrequesteds = $r->id;
            $requisition->requesteds()->attach
            (   $requisition->id,
                [
                    'requested_id'=>$idrequesteds,
                    'created_at' => now()
                ]
            );
        }
        $requisition = $requisition->user()
            ->attach(
                //  auth()->user()->id ,
                    $request->input('user_id'),
                [
                    'accountant' => $request->input('accountant'),
                    'created_at' => now()
                ]
            );

        return redirect()->route('request.index')->with('success','Requisición almacenada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition = AssignedRequisition::where('id','=',$id)->get();
        $requesteds = AssignedRequesteds::orderBy('requested_id','ASC')
            ->with('requested')
            ->where('requisition_id','=',$requisition[0]->requisition_id)
            ->get();
        return view('requisitions.request.show',compact('requisition','requesteds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisition = AssignedRequisition::findOrFail($id);
        if (is_null($requisition->requisition->file_req)) {
            return view('requisitions.request.edit',compact('requisition'));
        }else{
            return redirect(route('requisiciones.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $requisition)
    {
       $requisition = Requisition::findOrFail($requisition); //Actualizar estado de la requisicion
       $requisition->update($request->all());
       $requisition->status = $request->status;  // Busqueda del status
       $requisition->save();  // Guardar
       $requesteds = AssignedRequesteds::where('requisition_id','=', $requisition)->get(); //Se hace la busqueda en la tabla a partir del id de la requisicion
       foreach ($requesteds as $item => $v){   // Inicia el foreach para recorre los resultados
           foreach ($request->unit as $key => $val) { //Inicia el foreach para recorrer el request con los nuevos datos
               $array = array( //se crea un array para guardar las posiciones del primer foreach
                   $data2 = array(  //se crea un array para guardar las posiciones del segundo foreach
                       'departure' => $request->departure[$key],  //se pasan las variables del request
                       'quantity' => $request->quantity[$key],
                       'unit' => $request->unit[$key],
                       'concept' => $request->concept[$key],
                   ),   //Termina el primer array
           ); // Termina el segundo array
               Requested::where('id','=',$requesteds[$item]->requested->id)->update($data2); //Se guardan los datos
           } //Termina el recorrido del segundo foreach
       }  // Termina el recorrido del primer foreach
        return redirect()->route('request.index' )->with('update', 'Requisición Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requesteds = AssignedRequesteds::where('requisition_id', $id)->get();
        foreach ($requesteds as $i => $requested){
            Requested::where('id', $requested->requested_id)->delete();
        }
        $requisition = Requisition::findOrFail($id)->delete();
        return back()->with('destroy','Se han eliminado todos los registros de la requisición');
    }
}
