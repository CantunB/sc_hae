<?php

namespace HAE\Http\Controllers;

use Illuminate\Support\Facades\DB;
use HAE\AssignedRequisition;
use HAE\AssignedRequesteds;
use HAE\Coordination;
use HAE\Requisition;
use HAE\User;
use HAE\AssignedUserAreas;
use HAE\AssignedAreas;
use HAE\Requested;
use Illuminate\Http\Request;
use HAE\Http\Requests\RequisitionRequest;
use HAE\Http\Requests\RequisitionUploadRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
class RequisitionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_requisicion')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_requisicion')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_requisicion')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_requisicion')->only(['destroy']);


    public function upload ($requisition)
    {
        $requisition = Requisition::findOrFail($requisition);
        if (is_null($requisition->file_req)) {
            //return 'No Existe imagen' ;
            $requisition = $requisition;
            return view('requisitions.upload', compact('requisition'));
        }else{
            // return 'Existe imagen';
            $requisition = $requisition;
            return view('requisitions.authorized', compact('requisition'));
        }
    }


   /* Funcion para almacenar la requisicion autorizada
         por medio de la imagen
   */

    public function file_upload(RequisitionUploadRequest $request,  $requisition)
    {
        $requisition = Requisition::findOrFail($requisition);
        if ($request->hasFile('file_req')){
            $file = $request->file("file_req");
           //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  =  $requisition->folio .'_autorizada.'.$file->getClientOriginalExtension();
            $nombrearchivo = str_replace ( '/' , '_' , $nombrearchivo );
            $file->move(public_path("requisitions/autorizadas/"),$nombrearchivo);
            $requisition->file_req      = $nombrearchivo;
            $requisition->status        = 1;
            $requisition->save();
        }
        $requisition = AssignedRequisition::where('requisition_id',$requisition->id)->get();
        foreach ($requisition as $i => $req)
        {
            $req->status = 1;
            $req->save();
        }
        return redirect()->route('requisiciones.authoirzed.index')->with('success', 'Requisición autorizada');
    }
}
