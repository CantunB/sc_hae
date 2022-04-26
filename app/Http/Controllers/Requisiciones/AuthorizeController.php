<?php

namespace HAE\Http\Controllers\Requisiciones;

use HAE\AssignedRequisition;
use HAE\Http\Controllers\Controller;
use HAE\Requisition;
use Illuminate\Http\Request;

class AuthorizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('update_requisicion'))
        {
          $requisitions = AssignedRequisition::where('status','1')->get();
            return view('requisitions.authorized.index', compact('requisitions'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisitions = AssignedRequisition::findOrFail($id);
        if (is_null($requisitions->requisition->file_req)) {
            $requisitions = AssignedRequisition::findOrFail($id);
            // AssignedUserAreas::all();
            return view('requisitions.request.edit', compact('requisitions'));
        }else{
            $requisitions = AssignedRequisition::findOrFail($id);
            return view('requisitions.authorized.show', compact('requisitions'));
            //      return view('requisitions.load', compact('requisitions'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisicion = Requisition::where('id',$id)->update(['file_req' => null, 'status' => '0']);
        $requisition = AssignedRequisition::where('requisition_id',$id)->update(['status' => '0']);

        return redirect()->route('authorize.index');
    }
}
