<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element\PElement;
use Illuminate\Support\Facades\DB;

class PElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $output = PElement::all()->sortBy('kennung');

        $output = DB::table('p_elements')
        //->select('id', 'name', 'kennung')
        ->orderBy('name', 'asc')
        ->get();

        return $output;
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
     * @param  \App\Models\Element\PElement  $pElement
     * @return \Illuminate\Http\Response
     */
    public function show(PElement $pElement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Element\PElement  $pElement
     * @return \Illuminate\Http\Response
     */
    public function edit(PElement $pElement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element\PElement  $pElement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PElement $pElement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element\PElement  $pElement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PElement $pElement)
    {
        //
    }
}
