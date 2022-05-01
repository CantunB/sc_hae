<?php

namespace HAE\Http\Controllers\PDF;

use HAE\AssignedRequesteds;
use HAE\AssignedRequisition;
use HAE\Http\Controllers\Controller;
use HAE\Requisition;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use HAE\PurchaseOrder;
use HAE\PurchaseOrderDetail;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{

    public function generate_pdf_request($id){

        // return Requisition::download($request->requisition);
        $requisition = Requisition::with(['requesteds','departments','coordinations'])->findOrFail($id);
        $request = PDF::loadView('pdf.requisition_request', compact('requisition'));
        $path = public_path('requisitions/requesteds/'. $requisition->folio. '.pdf');
        $request->save($path);
        return $request->stream('REQ.'.$requisition->folio.'.pdf');

        return response()->json(['data' => $requisition], 201);
    }
    public function generate_pdf_order($id)
    {
        $order = PurchaseOrder::where('id',$id)->first();
        $materials = PurchaseOrder::where('pur_order_details_id',$order->pur_order_details_id)->orderBy('id','DESC')->get();
        $order_pdf =  PDF::loadView('pdf.purchase_order',compact('materials', 'order'));
        $path = public_path('requisitions/requesteds/'. $order->detail->order_folio. '.pdf');
        $order_pdf->save($path);
        return $order_pdf->stream('Orden-'.$order->detail->order_folio.'.pdf');
    }
    public function download_pdf_request(Request $request)
    {
        // $booking = Booking::with(['TypeUnit','Country','State'])->findOrFail($id);
        $requisition = Requisition::findOrFail($request->id);
        $fileName =  $requisition->folio . '.' . 'pdf' ;
        $pdf = public_path('requisitions/requesteds/'.$fileName);
        return response()->download($pdf);
    }
    public  function requisition_pdf()
    {
        $requisition = Requisition::with(['requesteds','departments','coordinations'])->findOrFail(1);
        return view('pdf.requisition_request', compact('requisition'));
    }
    public  function order_pdf()
    {
        return view('pdf.purchase_order');
    }

}
