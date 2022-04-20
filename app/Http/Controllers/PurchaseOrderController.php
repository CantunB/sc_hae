<?php

namespace Smapac\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Smapac\AssignedRequesteds;
use Smapac\AssignedUserAreas;
use Smapac\AssignedAreas;
use Smapac\Coordination;
use Smapac\Providers;
use Smapac\Purchase;
use Smapac\PurchaseOrder;
use Smapac\PurchaseOrderDetail;
use Smapac\PurchaseOrderFeauture;
use Smapac\PurchaseOrderMaterial;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Smapac\Quotesrequisitions;

class PurchaseOrderController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role_or_permission:create_compras')->only(['create','store']);
    $this->middleware('role_or_permission:read_compras')->only(['index','show']);
    $this->middleware('role_or_permission:update_compras')->only(['edit','update']);
    $this->middleware('role_or_permission:delete_compras')->only(['destroy']);

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return 'Hola';
        $purchase = PurchaseOrder::select('department_id')->distinct(['department_id'])->get();
        foreach ($purchase as $key => $purchaseorder) {
            $array = array(
                $counts[] = PurchaseOrder::where('department_id', $purchaseorder->department_id)
                    ->distinct(['pur_order_details_id'])
                    ->count('pur_order_details_id')
            );

        }
        if (empty($counts)) {
            $counts = 0;
        } else {
            $counts;
        }

          return view('compras.ordenes.index', compact('purchase','counts'));
    }

       public function list($purchaseorders)
    {
             $purchaseorders = PurchaseOrder::distinct()
            ->where('department_id', $purchaseorders)
           ->get(['pur_order_details_id']);

//        $purchaseorders = PurchaseOrder::distinct()
//            ->get(['pur_order_details_id']);
        return view('compras.ordenes.list', compact('purchaseorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $compra = PurchaseOrder::all()->last();
        if($compra === null) {
            $compra = new PurchaseOrder();
            $compra = $compra->accountant = 1;
        }else {
            $compra = $compra->accountant + 1;
        }

       // $data = AssignedRequesteds::distinct()->where('requisition_id', '=', $purchaseOrder)->get(['requisition_id']);
        $providers = Providers::all();
        //$requesteds = AssignedRequesteds::where('requisition_id', '=', $purchaseOrder)->orderBy('id', 'DESC')->where('status', '0')->get();
        $coordinations = Coordination::all();
        return view('compras.ordenes.new', compact('compra','providers','coordinations'));
    }

    public function details($orden)
    {
        $orden = PurchaseOrder::findOrFail($orden);
        $provider_id = $orden->detail->provider_id;
        $requisition_id = $orden->detail->requisition_id;
        //$provider_id = $orden->detail->provider_id;
        //$cotizacion_archivo = Quotesrequisitions::where('provider_id', $provider_id)->get();
        $cotizacion = Quotesrequisitions::where('requisition_id', $requisition_id)
                        ->where('provider_id',$provider_id)->get();
        //$quote_info = pathinfo(storage_path().'/requisitions/cotizadas/'. $cotizacion[0]->quote_file);
        //$quote_ext = $quote_info['extension'];
        $req_ext = [];
        $quote_ext = [];
        foreach ($cotizacion as $key => $cot)
        {
            $quote_ext[] = pathinfo(storage_path().'/requisitions/cotizadas/'. $cot->quote_file, PATHINFO_EXTENSION);
            $req_ext[] = pathinfo(storage_path().'/requisitions/cotizadas/'. $cot->requisition->file_req, PATHINFO_EXTENSION);
        }
        $materials = PurchaseOrder::where('pur_order_details_id',$orden->pur_order_details_id)->orderBy('id','ASC')->get();
       // foreach ($materials as $key => $material) {
        //    $materials = PurchaseOrderMaterial::where('id',$material[$key]->pur_order_material_id)->orderBy('id','ASC')->get();
        //}
      // return storage_path().'/requisitions/cotizadas/';
        //$name_quote_file = ;
       // $size_quote = Storage::root();
       // return $size;
        return view('compras.ordenes.details',compact('orden','cotizacion','quote_ext','req_ext','materials'));
    }
    public function getordenes()
    {
        return view('compras.ordenes.getordenes');
    }


    public function ordenes_autorizar(Request $request)
    {
        //return "hola controlador";
        $ids = $request->chk;
      //  return explode(',', $request);
        foreach ($ids as $i => $id) {
            $ordenes = PurchaseOrder::where('id',$id)->get();
            foreach ($ordenes as $j => $orden) {
                $array = array( //se crea un array para guardar las posiciones del primer foreach
                    $data = array(  //se crea un array para guardar las posiciones del segundo foreach
//                        'departure' => $request->departure[$key],  //se pasan las variables del request
//                        'quantity' => $request->quantity[$key],
                        'status' => '1' ,
//                        'concept' => $request->concept[$key],
                    ),   //Termina el primer array
            ); // Termina el segundo array
            $ordenes = PurchaseOrder::where('pur_order_details_id', $orden->pur_order_details_id)->update($data);
            }
        }
        return 'Actualizado';


    }  // Termina el recorrido del primer foreach
    public function ordenes_no_autorizar(Request $request)
    {
        //return "hola controlador";
        $ids = $request->chk;
      //  return explode(',', $request);
        foreach ($ids as $i => $id) {
            $ordenes = PurchaseOrder::where('id',$id)->get();
            foreach ($ordenes as $j => $orden) {
                $array = array( //se crea un array para guardar las posiciones del primer foreach
                    $data = array(  //se crea un array para guardar las posiciones del segundo foreach
//                        'departure' => $request->departure[$key],  //se pasan las variables del request
//                        'quantity' => $request->quantity[$key],
                        'status' => '0' ,
//                        'concept' => $request->concept[$key],
                    ),   //Termina el primer array
            ); // Termina el segundo array
            $ordenes = PurchaseOrder::where('pur_order_details_id', $orden->pur_order_details_id)->update($data);
            }
        }
        return 'Actualizado';


    }  // Termina el recorrido del primer foreach






    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        /**** ALMACENAR DETALLES DE ORDEN DE COMPRA ****/

        //folio orden
        $order_folio = $request->folio_or . $request->type_or . '-' . $request->count_or . '-' . $request->date_or;
        //folio analisis de precio
        $analysis_folio = $request->folio_analysis  . $request->type_analysis . $request->count_analysis . $request->date_analysis;

        $detalles = new PurchaseOrderDetail();
        $detalles->order_folio = $order_folio;
        $detalles->analysis_folio = $analysis_folio;
        $detalles->coordination = $request->coordination;
        $detalles->department = $request->department;
        $detalles->unit_administrative= $request->unit_admnistrative;
        $detalles->provider_id = $request->provider_id;
        $detalles->department_id = $request->department;
        $detalles->requisition_id = $request->requisition_id;
        $detalles->save();

        $detalles = $detalles->id;
        /*** ALMACENAR MATERIALES DE ORDEN DE COMPRA ****/

        $material = new PurchaseOrderMaterial();
        foreach ($request->departure as $item => $v) {
            $data2 = array(
                'departure' => $request->departure[$item],
                'quantity' => $request->quantity[$item],
                'unit' => $request->unit[$item],
                'concept' => $request->concept[$item],
                'unit_cost' => $request->unit_price[$item],
                'cost_quantity' => $request->importe[$item],
                'cost_amount' => $request->imp_final,
                'p_disc' => $request->desc,
                'discount' => $request->val_desc,
                'subtotal' => $request->subtotal,
                'p_iva' => $request->iva,
                'iva' => $request->Total_iva,
                'total_order' => $request->total,
                'created_at' => now(),
            );
            $material = PurchaseOrderMaterial::insert($data2);
        }

        //obtener los registros insertados
        $material = PurchaseOrderMaterial::latest()->orderBy('id', 'desc')
            ->take($request->input('contador_mat'))
            ->get();


        /**** ALMACENAR LOS EXTRAS DE LA ORDEN DE COMPRA  *****/

        $extras = new PurchaseOrderFeauture();
        $extras->delivery_time = $request->entrega;
        $extras->existence = $request->existencia;
        $extras->payment_method = $request->forma_pago;
        $extras->price_term = $request->vigencia;
        $extras->other = $request->otras;
        $extras->program = $request->programa;
        $extras->application = $request->aplicacion;
        $extras->vehicle = $request->vehiculo;
        $extras->save();

        $extras = $extras->id;
        /**** ASIGNAR LOS ID EN LA ORDEN DE COMPRA  *****/
        $purchaseorder = new PurchaseOrder();

        foreach ($material as $mat) {
            $purchaseorder->pur_order_detail()->attach(
                $detalles,
                [
                    'accountant' => $request->count_or,
                    'department_id' => $request->department,
                    'pur_order_details_id' => $detalles,
                    'pur_order_material_id' => $mat->id,
                    'pur_order_features_id' => $extras,
                    'created_at' => now()
                ]
            );
        }

        return redirect()->route('ordenes.list', $request->department)->with('success', 'Orden de compra generada');
    }

    /**
     * Display the specified resource.
     *
     * @param \Smapac\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show($purchaseOrder)
    {
        $compra = PurchaseOrder::all()->last();
            if($compra === null) {
                $compra = new PurchaseOrder();
                $compra = $compra->accountant = 1;
            }else {
                $compra = $compra->accountant + 1;
            }
        $data = AssignedRequesteds::distinct()->where('requisition_id', '=', $purchaseOrder)->get(['requisition_id']);
        $providers = Providers::all();
        $requesteds = AssignedRequesteds::where('requisition_id', '=', $purchaseOrder)->orderBy('id', 'DESC')->where('status', '0')->get();

        return view('compras.ordenes.show', compact('data', 'providers', 'requesteds','compra'));
    }

    /* Funcion para ver los detalles de la orden de compra */
    public function order($purchaseorder)
    {

      $purchaseorder = PurchaseOrder::where('id',$purchaseorder)->first();
        $id = $purchaseorder->pur_order_details_id;

        $materials = PurchaseOrder::where('pur_order_details_id',$id)->orderBy('id','DESC')->get();
        return view('compras.ordenes.purchaseorder', compact('purchaseorder','materials'));
    }

    /* Funcion para generar el pdf de la orden de compra */
    public function pdf($purchaseorder)
    {

      /** Consulta para obtener el director**/
      $director = 'Ing. Nicolas Hernandez Ynurreta Mancera';
      $coordinador = 'L.A.E Bianca Eugenia Saenz Ortega';
      $titular = 'L.N.I. Blanca Veronica Alonso Velazquez';
      //$director = DB::table('role_user')->where('role_id','=',$director->id)->get();
      //$director = AssignedUserAreas::where('user_id','=',$director[0]->user_id)->get();


        $purchaseorder = PurchaseOrder::where('id',$purchaseorder)->first();
        $id = $purchaseorder->pur_order_details_id;
        $materials = PurchaseOrder::where('pur_order_details_id',$id)->orderBy('id','DESC')->get();
        $folio = PurchaseOrderDetail::where('id',$purchaseorder->pur_order_details_id)->get();
        $pdf = PDF::loadView('compras.ordenes.ordenescompra_pdf',compact('purchaseorder','materials','director','coordinador','titular'));
       // return $pdf->download('Orden de compra No.'.$folio[0]->order_folio.$purchaseorder->pdf.'.pdf');
        return $pdf->stream('Orden de compra No.'.$folio[0]->order_folio.$purchaseorder->pdf.'.pdf');
    }

    /*** Vista para subir Factura ***/
    public  function factura($purchaseorder)
    {

    }


 /*** Subir Factura ***/
    public  function factura_upload(Request $request,  $purchaseorder)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Smapac\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($purchaseorder)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Smapac\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purchaseorder)
    {
     $orden =  PurchaseOrder::findOrFail($purchaseorder);
     $orden = $orden->pur_order_details_id;
     $orden = PurchaseOrder::where('pur_order_details_id',$orden)->get();
     foreach ($orden as $i => $ord)
     {
         $ord->observation = $request->observation;
         $ord->save();
     }

     return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Smapac\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy( $purchaseOrder)
    {
        $order =  PurchaseOrder::findOrFail($purchaseOrder);
            $order_details = $order->pur_order_details_id;
        $orders = PurchaseOrder::where('pur_order_details_id', $order_details)->get();
        foreach ($orders as $key => $order ){
            $order_material = PurchaseOrderMaterial::where('id',$order->pur_order_material_id)->delete();
            $order_features = PurchaseOrderFeauture::where('id',$order->pur_order_features_id)->delete();
            $order_details = PurchaseOrderDetail::where('id',$order->pur_order_details_id)->delete();
            $order->delete();
        }
        return redirect()->route('ordenes.index');
    }


}
