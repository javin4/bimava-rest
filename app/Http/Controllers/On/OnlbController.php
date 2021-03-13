<?php

namespace App\Http\Controllers\ON;

use App\Models\On\Onlb;
use App\Models\On\Onlg;
use Illuminate\Http\Request;
use App\Importer\OnlbImporter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OnlbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){    
        $onlbs = Onlb::with([
            'onlg' => function($q){
                $q->select('lg_nr','bezeichnung','onlb_id','id');
                //$q->select('*');
            },
            'onlg.onulg' => function($q){
                $q->select('ulg_nr','bezeichnung','onlg_id');
                //$q->select('*');
            }
        ])
            ->select('bezeichnung','lbkennung','versionsnummer','id')
                //->select('*')
            ->get();
        
        return response()->json($onlbs, 200);
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
    public function store(Request $request){
        $path = storage_path() . "\ONLB\LB-HB021-A2063-2015_mod.onlb";       
        $onlbImporter = new OnlbImporter($path);   
        $onlb = $onlbImporter->import();
        return response()->json($onlb, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ON\Onlb  $onlb
     * @return \Illuminate\Http\Response
     */
    public function show(Onlb $onlb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ON\Onlb  $onlb
     * @return \Illuminate\Http\Response
     */
    public function edit(Onlb $onlb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ON\Onlb  $onlb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onlb $onlb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ON\Onlb  $onlb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onlb $onlb)
    {
        //
    }
    
}
