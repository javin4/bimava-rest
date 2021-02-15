<?php

namespace Database\Seeders\Element;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Element\PComponent;
use Illuminate\Support\Facades\DB;
use App\Models\Element\PElementTyp;

class PComponentSeeder extends Seeder{

    public function floatvaldec($v, $dec=',') {
        return floatval(preg_replace ("," , "." , preg_replace ("[^-0-9$dec]","",$v)));
    }

    public function run(){
        $typ1 = PElementTyp::findorfail('49584723-5550-4bbd-ac0b-cb07ca36652a');
        $filename = base_path().'\database\seeders\Element\PComponentSeeder.csv';
        $fileurls = fopen($filename, 'r');

        $head = fgetcsv($fileurls, 0, ';');

        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){
            //$ehp_override = preg_replace("([^0-9\.])","",str_replace(",",".",$row[5]));
            if ($row[0]==0) 
                {
                    $id = Str::uuid()->toString();  
                }
            else {
                $id = $row[0];                  
                $pcomponent = PComponent::find($id);
                if (!$pcomponent){
                    DB::table('p_components')->insert(
                        array (
                            'id' => $id,               //id
                            'kennung' => $row[2],    //kennung
                            'name' => $row[3],      //name
                            'ehp_override' =>  preg_replace("([^0-9\.])","",str_replace(",",".",$row[5])),
                            'ehp_computed' =>  preg_replace("([^0-9\.])","",str_replace(",",".",$row[6]))
                        )
                    );
                } 
                

                $typ1 = PElementTyp::findorfail($row[1]);
                $typ1->PComponents()->attach($id,['id'=> Str::uuid()->toString()]);
               
                unset($pcomponent);
                unset($typ1);
            }

        }
    }//end function run

    
}