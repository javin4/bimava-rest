<?php

namespace App\Http\Controllers;

use App\Models\ON\On_Ulg;
use Illuminate\Http\Request;

class On_UlgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ulgs = On_Ulg::all();
        return  $ulgs;
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
     * @param  \App\Models\ON\On_Ulg  $On_Ulg
     * @return \Illuminate\Http\Response
     */
    public function show(On_Ulg $On_Ulg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ON\On_Ulg  $On_Ulg
     * @return \Illuminate\Http\Response
     */
    public function edit(On_Ulg $On_Ulg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ON\On_Ulg  $On_Ulg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, On_Ulg $On_Ulg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ON\On_Ulg  $On_Ulg
     * @return \Illuminate\Http\Response
     */
    public function destroy(On_Ulg $On_Ulg)
    {
        //
    }
}
