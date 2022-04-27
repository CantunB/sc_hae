<?php

namespace HAE\Http\Controllers\Compras;

use HAE\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use HAE\PurchaseOrder;
use HAE\Purchase;
use HAE\PurchaseInvoice;

class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $purchase = PurchaseInvoice::select('department_id')->distinct(['department_id'])->paginate(10);
      foreach ($purchase as $key => $p) {
          $array= array(
              $counts[]= PurchaseInvoice::where('department_id',$p->department_id)
                  ->distinct(['purchase_id'])
                  ->count('purchase_id')
          );

      }
      if (empty($counts)){
          $counts = 0;
      }else{
          $counts;
      }

      return view('compras.facturas.index', compact('purchase','counts'));
    }

    public function list($purchaseorders)
 {
          $purchaseorders = PurchaseInvoice::distinct()
         ->where('department_id', $purchaseorders)
        ->get(['purchase_id']);

//        $purchaseorders = PurchaseOrder::distinct()
//            ->get(['pur_order_details_id']);
     return view('compras.facturas.list', compact('purchaseorders'));
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
     * @param  \HAE\Models\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($purchaseInvoice)
    {
     $purchasesinvoices = PurchaseInvoice::where('purchase_id',$purchaseInvoice)->get();
    //  return $purchases;
      // if (!is_null($purchase)) {
      return view('compras.facturas.show', compact('purchasesinvoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HAE\Models\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit( $purchaseInvoice)
    {
    //  return $purchaseInvoice;
        $purchaseorder = Purchase::where('id',$purchaseInvoice)->first();

        $purchasesinvoices = PurchaseInvoice::where('purchase_id', $purchaseorder->id)->get();

          return view('compras.facturas.edit', compact('purchaseorder','purchasesinvoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HAE\Models\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $purchaseorder)
    {
   // return $request->all();
        if ($request->type === 'Completa') {
            $purchaseorders = Purchase::where('id',$purchaseorder)->get();
            foreach ($purchaseorders as $key => $v){
                // return $v;
                // $pur = Purchase::where('purchase_order_id', $v->id)->get();
                if($request->hasFile('invoice_file')) {
                    foreach ($request->invoice_file as $key => $value) {
                        $invoice_filename = $request->invoice_file[$key]->getClientOriginalName();
                        //   $ext = $req = $request->invoice_file[$key]->clientExtension();
                        $data2=array(
                            'type' => $request->type,
                            'department_id' => $request->department_id,
                            'purchase_id' => $request->purchase_id,
                            'amount' => $request->amount[$key],
                            'invoice_file' => $invoice_filename,
                            'observation' => $request->observation[$key],
                            'total_purchase' => $request->amount[$key],
                            'created_at' => now(),
                        );
                        $request->invoice_file[$key]->move(public_path('ordenes/facturas'), $invoice_filename);
                        $purchase = PurchaseInvoice::insert($data2);
                        // $purchase = Purchase::updateOrCreater->where('id',$p->id)->update($data2);
                        // Requested::where('id','=',$requesteds[$item]->requested->id)->update($data2);
                    }
                    //         return  $data2;
                }
                // foreach ($purchaseorder as $key => $orderupdate) {
                //
                // }
                $purchaseautorize = Purchase::where('purchase_order_id', $v->purchase_order_id)->get();
                foreach($purchaseautorize as $pur_autorize){
                    $pur_autorize->status = 1;
                    $pur_autorize->save();
                    $purchaseorder = PurchaseOrder::where('id',$pur_autorize->purchase_order_id)->get();
                    $purchaseorder = PurchaseOrder::where('pur_order_details_id',$purchaseorder[0]->pur_order_details_id)->get();
                    foreach ($purchaseorder as $key => $order_update) {
                        $order_update->status = 2;
                        $order_update->save();
                    }

                }
            }
        }else{
            $purchaseorders = Purchase::where('id',$purchaseorder)->get();
            foreach ($purchaseorders as $key => $v){
                if($request->hasFile('invoice_file')) {
                    foreach ($request->invoice_file as $key => $value) {
                        $invoice_filename = $request->invoice_file[$key]->getClientOriginalName();
                        $data2=array(
                            'type' => $request->type,
                            'department_id' => $request->department_id,
                            'purchase_id' => $request->purchase_id,
                            'amount' => $request->amount[$key],
                            'invoice_file' => $invoice_filename[$key],
                            'observation' => $request->observation[$key],
                            'total_purchase' => $request->amount[$key],
                            'created_at' => now(),
                        );
                        $request->invoice_file[$key]->move(public_path('ordenes/facturas'), $invoice_filename);
                        $purchase = PurchaseInvoice::insert($data2);
                    }
                }
                $purchaseautorize = Purchase::where('purchase_order_id', $v->purchase_order_id)->get();
                foreach($purchaseautorize as $pur_autorize){
                    $pur_autorize->status = 1;
                    $pur_autorize->save();
                    $purchaseorder = PurchaseOrder::where('id',$pur_autorize->purchase_order_id)->get();
                    $purchaseorder = PurchaseOrder::where('pur_order_details_id',$purchaseorder[0]->pur_order_details_id)->get();
                    foreach ($purchaseorder as $key => $order_update) {
                        $order_update->status = 1;
                        $order_update->save();
                    }

                }
            }
        }


       return redirect()->route('facturas.index')->with('success', 'Facturas Almacenadas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HAE\Models\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($purchaseInvoice)
    {
        $facturas = PurchaseInvoice::findorFail($purchaseInvoice);
        if($facturas->type === 'Completa'){
            Storage::delete(public_path('ordenes/facturas/'),$facturas->invoice_file);
            $compra = Purchase::where('id',$facturas->purchase_id)->get();
            foreach ($compra as $key => $value) {
                $value->status = 0;
                $value->save();

                //return $value;
                $order = PurchaseOrder::where('id', $value->purchase_order_id)->first();
                $order = PurchaseOrder::where('pur_order_details_id', $order->pur_order_details_id)->get();
                foreach ($order as $key => $value) {
                    $value->status = 1;
                    $value->save();
                }
            }
            $facturas->delete();
        }

        return redirect()->route('autorizadas.index');

    }
}
