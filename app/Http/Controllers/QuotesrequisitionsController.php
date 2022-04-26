<?php

namespace HAE\Http\Controllers;

use Illuminate\Http\Request;
use HAE\AssignedRequisition;
use HAE\Providers;
use HAE\Purchase;
use HAE\Quotesrequisitions;
use Illuminate\Http\UploadedFile;
use HAE\Requisition;

class QuotesrequisitionsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role_or_permission:create_quotes')->only(['create','store']);
    //     $this->middleware('role_or_permission:read_quotes')->only(['index','show']);
    //     $this->middleware('role_or_permission:update_quotes')->only(['edit','update']);
    //     $this->middleware('role_or_permission:delete_quotes')->only(['destroy']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $quotes = Quotesrequisitions::select('department_id')->distinct(['department_id'])->paginate(10);
      foreach ($quotes as $key => $quote) {
          $array= array(
              $counts[]= Quotesrequisitions::where('department_id',$quote->department_id)
                  ->distinct(['requisition_id'])
                  ->count('requisition_id')
          );
      }
      if (empty($counts)){
          $counts = 0;
      }else{
          $counts;
      }

        return view('cotizaciones.index', compact('quotes','counts'));
    }

    public function list($quotes)
    {
        $quotes = Quotesrequisitions::distinct()->where('department_id',$quotes)->get(['requisition_id']);
        $count = [];
        foreach ($quotes as $key => $quote) {
           $count[] = Quotesrequisitions::where('requisition_id', $quote->requisition_id)->count();
        }
       // $count = Quotesrequisitions::distinct()->where('department_id',$quotes)->get(['requisition_id']);
        return view('cotizaciones.list', compact('quotes','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //   $request->all();
        //dd($request->quote_file);
        if($request->hasFile('quote_file')){
            $file = $request->file('quote_file');
            foreach ($request->quote_file as $item=>$v ) {
                $filename = $request->quote_file[$item]->getClientOriginalName();
                $data2=array(
                    //'quote_file' => $request->quote_file[$item],
                    'department_id' => $request->department_id,
                    'requisition_id' => $request->requisition_id,
                    'provider_id' => $request->provider_id[$item],
                    'quote_file' => $filename,
                    'created_at' => now(),
                    //'quantity' => $request->quantity[$item],
                );
                $request->quote_file[$item]->move(public_path('requisitions/cotizadas'), $filename);
                Quotesrequisitions::insert($data2);
            }
        }

//        $requisition = Requisition::findOrFail($request->requisition_id);
//        $requisition->status = 2;
//        $requisition->save();

        return redirect()->route('cotizaciones.index')->with('success','Cotización realizada');

    }

    public function nueva($quotesrequisitions)
    {
         $requisition = AssignedRequisition::findOrFail($quotesrequisitions);
        $providers  = Providers::all();
        return  view('cotizaciones.new',compact('providers','requisition'));

    }
    public function new(Request $request)
    {
         //return $request->all();
        $cotizacion = Quotesrequisitions::create($request->all());
        if ($request->has('quote_file')) {
            $sf = $request->file('quote_file');
            $file = $request->quote_file->getClientOriginalName();
            $path = public_path('requisitions/cotizadas');
            $sf->move($path, $file);
            $cotizacion->quote_file = 'requisitions/cotizadas'. $file;
            $cotizacion->save();
        }
        // if($request->hasFile('quote_file')){
        //     $file = $request->file('quote_file');
        //     foreach ($request->quote_file as $item=>$v ) {
        //         $filename = $request->quote_file[$item]->getClientOriginalName();
        //         $data2=array(
        //             //'quote_file' => $request->quote_file[$item],
        //             'department_id' => $request->department_id,
        //             'requisition_id' => $request->requisition_id,
        //             'provider_id' => $request->provider_id[$item],
        //             'quote_file' => $filename,
        //             'created_at' => now(),
        //             //'quantity' => $request->quantity[$item],
        //         );
        //         $request->quote_file[$item]->move(public_path('requisitions/cotizadas'), $filename);
        //         Quotesrequisitions::insert($data2);
        //     }
        // }
        return redirect()->route('cotizaciones.index')->with('success','Cotización nueva creada');
    }
    /**
     * Display the specified resource.
     *
     * @param  \HAE\Quotesrequisitions  $quotesrequisitions
     * @return \Illuminate\Http\Response
     */
    public function show( $quotesrequisitions)
    {
         $quotes = Quotesrequisitions::where('requisition_id','=', $quotesrequisitions)->get();
         if (!is_null($quotes)) {
             return view('cotizaciones.show', compact('quotes'));
         }else{
             return route('cotizaciones.new');
         }
    }

    public function actualizar( $quotesrequisitions)
    {

        $cotizacion = Quotesrequisitions::where('id','=',$quotesrequisitions)->first();
        $requisition = AssignedRequisition::where('requisition_id','=', $cotizacion->requisition_id)->first();
        $providers  = Providers::all();
        return view('cotizaciones.edit',compact('cotizacion','requisition','providers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HAE\Quotesrequisitions  $quotesrequisitions
     * @return \Illuminate\Http\Response
     */
    public function edit($quotesrequisitions)
    {
        $existe = AssignedRequisition::findOrFail($quotesrequisitions);//consulta para obtener la requisicion
        if(!is_null($existe->requisition->file_req)){ // Primera condicion para saber si existe imagen de autorizacion
            $cotizado = Quotesrequisitions::where('requisition_id',$existe->requisition->id)->first(); //consulta si existe una cotizacion
            if ($cotizado){ //Si existe
                $quotes = Quotesrequisitions::where('requisition_id','=', $existe->requisition->id)->get();
                return view('cotizaciones.show', compact('quotes')); // Retorna a la vista donde estan las cotizaciones
            }else{  // Si no existe registro de cotizaciones muestra la vista por primera vez una cotizacion
                $requisition = AssignedRequisition::with('requisition')->findOrFail($quotesrequisitions);
                $providers  = Providers::all();
                return view('cotizaciones.create',compact('requisition','providers'));
            }
        }else{ // Si no existe la imagen de autorizacion regreso
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HAE\Quotesrequisitions  $quotesrequisitions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $quotesrequisitions)
    {
        $cotizacion = Quotesrequisitions::findOrFail($quotesrequisitions);
        $cotizacion->update($request->all());
        return redirect('cotizaciones')->with('update', 'Cotización actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HAE\Quotesrequisitions  $quotesrequisitions
     * @return \Illuminate\Http\Response
     */
    public function destroy($quotesrequisitions)
    {
      //  return  $quotesrequisitions;
       // UserSeeder::where('in_black_list', true)->get()->each->delete();
        $quotes = Quotesrequisitions::where('requisition_id','=',$quotesrequisitions)->get()->each->delete();
//        $requisition = Requisition::findOrFail($quotesrequisitions);
//        $requisition->status = '1';
//        $requisition->save();
        $products = Purchase::where('requisition_id','=',$quotesrequisitions)->get()->each->delete();
        return back()->with('destroy','Todas las cotizaciones han sido eliminadas');
    }

    public function delete ($quotesrequisitions)
    {
        $quotes = Quotesrequisitions::findOrFail($quotesrequisitions);
        $quotes->delete();
        return back()->with('destroy','Cotización eliminada');
    }
}
