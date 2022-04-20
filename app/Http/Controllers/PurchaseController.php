<?php

namespace Smapac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\File;
use NunoMaduro\Collision\Provider;
use Smapac\AssignedRequesteds;
use Smapac\AssignedRequisition;
use Smapac\Providers;
use Smapac\Purchase;
use Smapac\PurchaseOrder;
use Smapac\PurchaseOrderDetail;
use Smapac\Requested;
use Barryvdh\DomPDF\Facade as PDF;
use Smapac\Requisition;
use Smapac\Storehouse;

class PurchaseController extends Controller
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

      $purchase = Purchase::select('department_id')->distinct(['department_id'])->get();
      foreach ($purchase as $key => $purchaseorder) {
          $array = array(
              $counts[] = Purchase::where('department_id', $purchaseorder->department_id)
                  ->distinct(['purchase_order_id'])
                  ->count('purchase_order_id')
          );
      }
      if (empty($counts)) {
          $counts = 0;
      } else {
          $counts;
      }

      return view('compras.autorizadas.index', compact('purchase','counts'));


    }

    public function list($purchaseorders)
    {
        $purchaseorders = Purchase::distinct()
            ->where('department_id', $purchaseorders)
            ->get(['purchase_order_id']);


        return view('compras.autorizadas.list', compact('purchaseorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \Smapac\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($purchase)
    {
         $purchases = Purchase::where('purchase_order_id',$purchase)->get();
        //$purchasesinvoices = PurchaseInvoice::where('purchase_id',$purchaseInvoice)->get();
        return view('compras.autorizadas.show', compact('purchases'));
    }


    public  function purchasespdf($purchase)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Smapac\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit( $purchase)
    {
        $existe = Purchase::where('purchase_order_id',$purchase)->first();
        if(is_null($existe)) {
            $purchaseorder = PurchaseOrder::where('id',$purchase)->first();
            return view('compras.autorizadas.edit', compact('purchaseorder'));
        }else{
            return redirect()->route('facturas.show', $purchase);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Smapac\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $purchaseorder)
    {
       // return $request->all();
    $purchaseorder = PurchaseOrder::where('id',$purchaseorder)->first();
    $folio = PurchaseOrderDetail::where('id',$purchaseorder->pur_order_details_id)->get();

     //  return $request->all();
       if ($request->hasFile('order_file')) {
           foreach ($request->order_file as $key => $value) {
             // $nameimage = 'REQ.'.$r.'.'.time();
            $file = $request->file('order_file');
            $order_filename = $request->order_file[$key]->getClientOriginalName();
          //  $order_filename = 'Autorizacion'.$key.'-'.$request->order_file[$key]->getClientOriginalName().'-'.now()->format('d-m-y');
             // return $ext = $req = $request->invoice_file[$key]->clientExtension();
            //  $order_filename = 'Autorizacion'.$key.'-'.$folio[0]->order_folio.'.'.now()->format('d-m-y').;
               $data2=array(
                   'department_id' => $request->department_id,
                   'purchase_order_id' => $request->purchase_id,
                   'order_file' => $order_filename,
                   'created_at' => now(),
               );
               $file[$key]->move(public_path('ordenes/autorizadas'), $order_filename);
                $purchase = Purchase::insert($data2);
           }
              $purchase_order = PurchaseOrder::findOrFail($request->purchase_id);
               $purchase_order = PurchaseOrder::where('pur_order_details_id',$purchase_order->pur_order_details_id)->get();
               foreach($purchase_order as $po){
                  $po->status = 2;
                  $po->save();
                }
              // return 'actualizado';
//         return  $data2;
       }
       // return   $purchaseorder = PurchaseOrder::where('pur_order_details_id', $purchaseorder)->get();

       return redirect()->route('autorizadas.list',$request->department_id)->with('success', 'Orden de compra autorizada almacenada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Smapac\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy( $purchase)
    {

    }

    public function deleteautorizacion($id)
    {
        $purchases = Purchase::where('purchase_order_id',$id)->get();
            foreach ($purchases as $key => $purchase){
                Storage::delete(public_path('ordenes/autorizadas/'),$purchase->orde_file);
                $purchase->delete();
            }
        $purchase = PurchaseOrder::where('pur_order_details_id', $id)->get();
            foreach ($purchase as $key => $value){
                $value->status = 0;
                $value->save();
            }
    return redirect()->back();
    }
}
