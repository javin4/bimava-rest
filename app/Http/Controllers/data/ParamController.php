<?php

namespace App\Http\Controllers\data;

use App\Models\data\Param;
use Illuminate\Http\Request;
use App\Models\data\ParamValue;
use App\Http\Controllers\Controller;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $params = Param::with('values')->get();
        return $params;
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
        $param = Param::firstorNew([
            'name' => 'Feuerwiderstandsklasse',
            'category' => 'Brandschutz',
            'Source' => 'EN 13501-2'
        ]);
        $param->save();
        

        $array = array(
            "EI30",
            "EI60",
            "EI90",
        );

        foreach ($array as &$value) {
            $paramvalue = ParamValue::firstorNew([
                'value' => $value,
            ]); 
    
            $paramvalue->save();
            $param->values()->save($paramvalue);
        }
      
        

        //$post->comments()->save($comment);
        return $paramvalue;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function show(Param $param)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function edit(Param $param)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Param $param)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function destroy(Param $param)
    {
        //
    }
}
