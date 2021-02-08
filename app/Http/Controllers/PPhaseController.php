<?php

namespace App\Http\Controllers;

use App\Models\PPhase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2($root_id){
        $pp_root = PPhase::find($root_id);  
        $output = $pp_root->allChildren;

        $sorted = $output->sortBy('kennung');
        $sorted->values()->all();

        //return "aaa";
        return $sorted;
        return response()->json($sorted, 200);
    }

    public function index($root_id){
        $output = PPhase::where('parent_id',$root_id)->get();
        $sorted = $output->sortBy('kennung');
        return $sorted->values()->all();
        //return $sorted;
        return response()->json($output, 200);
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
     * @param  \App\Models\PPhase  $pphase
     * @return \Illuminate\Http\Response
     */
    public function show(PPhase $pphase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PPhase  $pphase
     * @return \Illuminate\Http\Response
     */
    public function edit(PPhase $pphase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PPhase  $pphase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PPhase $pphase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PPhase  $pphase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PPhase $pphase)
    {
        //
    }
}
