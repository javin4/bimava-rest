<?php

namespace App\Http\Controllers;

use App\Models\Element\PElementTyp;
use Illuminate\Http\Request;

class PElementTypController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $PElementDefs = PElementTyp::with(['PElement'=> 
            function($query){
            $query->select('p_element_typ_id','id');
           }])
        ->select('kennung','name','id')
        ->orderBy('kennung')
        ->get();
  
        return response()->json($PElementDefs, 200);
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
     * @param  \App\Models\Element\PElementTyp  $pElementTyp
     * @return \Illuminate\Http\Response
     */
    public function show(PElementTyp $pElementTyp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Element\PElementTyp  $pElementTyp
     * @return \Illuminate\Http\Response
     */
    public function edit(PElementTyp $pElementTyp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element\PElementTyp  $pElementTyp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PElementTyp $pElementTyp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element\PElementTyp  $pElementTyp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PElementTyp $pElementTyp)
    {
        //
    }
}
