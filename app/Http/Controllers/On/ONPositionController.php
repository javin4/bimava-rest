<?php

namespace App\Http\Controllers\ON;

use App\Models\ON\ON_Position;
use App\Importer\OnPosImporter;
use App\Models\data\ParamValue;
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
        $onpos = new ONPositionResource
        (
           // $ON_Position
           ON_Position::where('id', '392112F')->with('paramvalue')->first()
        );
       $test =  ON_Position::where('id', '392112F')->with('paramvalue')->first();
        return $test;
    }

    
    public function import(){
        $path = storage_path() . "\ONLB\LB-HB021-A2063-2015_mod_39.onlb";       
        $OnPosImporter = new OnPosImporter($path);   
        $onpos = $OnPosImporter->import();
        return response()->json($onpos, 200);
    }


    public function attachParam(){
      /*  $onpos = new ONPositionResource(
            ON_Position::where('postyp', 'gpos')->get();
        );*/
        //$onpos = ON_Position::where('postyp', 'fpos')->get();
        $onpos = ON_Position::find('392112F');
        //$onpos 

        /*foreach ($onpos as $pos) {
            echo $pos->name;
        }*/

        $paramValue = ParamValue::where('value','EI30')->first();
        $onpos->paramvalue()->attach($paramValue);
        return $paramValue;
        return 'aaa';
    }

    public function getWithParam(){
    }
}
