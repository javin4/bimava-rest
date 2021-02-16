<?php

namespace App\Http\Controllers;

use App\Models\gl\bgl;
use Illuminate\Http\Request;

class BglController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $root_id = '18fc28b4-4187-4844-9030-cc813ce5009b';
        $root = bgl::find($root_id);
        $output = $root->children;

        $sorted = $output->sortBy('kennung', SORT_STRING, true);
        $sorted->values()->all();

        $sorted = bgl::where('id', $root_id)        

        ->with('children')
       ->select('name', 'id')
        ->get();
        return $sorted;
    }


    public function indexH(){
        $p = bgl::all();
        return $p; 
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
     * @param  \App\Models\gl\bgl  $bgl
     * @return \Illuminate\Http\Response
     */
    public function show(bgl $bgl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gl\bgl  $bgl
     * @return \Illuminate\Http\Response
     */
    public function edit(bgl $bgl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gl\bgl  $bgl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bgl $bgl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gl\bgl  $bgl
     * @return \Illuminate\Http\Response
     */
    public function destroy(bgl $bgl)
    {
        //
    }
}
