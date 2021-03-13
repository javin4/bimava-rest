<?php

namespace App\Http\Controllers\ON;

use App\Models\ON\ON_Position;
use App\Importer\OnPosImporter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ONPositionResource;

class ONPositionController extends Controller{
 
    public function index(){
        $onpos = new ONPositionResource(ON_Position::find('_root'));
        return $onpos;
    }


    public function truncate(){
        ON_Position::truncate();
        return "db truncated";
    }


    public function show(ON_Position $ON_Position){
        $onpos = new ONPositionResource($ON_Position);
        return $onpos;
    }

    
    public function import(){
        $path = storage_path() . "\ONLB\LB-HB021-A2063-2015_mod_39.onlb";       
        $OnPosImporter = new OnPosImporter($path);   
        $onpos = $OnPosImporter->import();
        return response()->json($onpos, 200);
    }
}
