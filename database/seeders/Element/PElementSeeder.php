<?php

namespace Database\Seeders\Element;

use Illuminate\Database\Seeder;
use App\Models\Element\PElement;
use Illuminate\Support\Facades\DB;
use App\Models\Element\PElementTyp;

class PElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $PElementTyp1 = PElementTyp::findorfail('49584723-5550-4bbd-ac0b-cb07ca36652a');
        $PElementTyp1 = PElementTyp::findorfail('81ce88d9-e93c-4821-8b67-f0b5a82a1df7');
        
        $filename = base_path().'\database\seeders\Element\PElementSeeder.csv';
        $fileurls = fopen($filename, 'r');
        
        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){

            if ($row[0]==0){
                $ek = new PElement([
                    'name' => $row[1]
                ]);
            }
            else {
                DB::table('p_elements')->insert(
                    array(
                        'id' => $row[0],
                        'name' => $row[1]
                    )
                );
            }
        }

        $pelement1 = PElement::findorfail('664d77c5-b472-4d99-836e-d1a8eff21d8a');
        $PElementTyp1->PElement()->save($pelement1);
        $pelement2 = PElement::findorfail('352c8b5e-bd53-4c93-8db9-0ec489e21c8b');
        $PElementTyp1->PElement()->save($pelement2);
        $pelement3 = PElement::findorfail('59a399c6-17f9-4c73-aa3e-cffb225d35ab');
        $PElementTyp1->PElement()->save($pelement3);
    //connect
/*
; Element 2
; Element 3
*/
    }//end function run
}