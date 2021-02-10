<?php

namespace Database\Seeders\Element;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Element\PComponent;
use Illuminate\Support\Facades\DB;
use App\Models\Element\PElementTyp;

class PComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $typ1 = PElementTyp::findorfail('49584723-5550-4bbd-ac0b-cb07ca36652a');
        $filename = base_path().'\database\seeders\Element\PComponentSeeder.csv';
        $fileurls = fopen($filename, 'r');
        fgetcsv($fileurls, 0, ';'); //ignor first row...
        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){

            if ($row[0]==0){
                $ek = PComponent::create([
                    'kennung' => $row [2],
                    'name' => $row[3]
                ]);
 
            }
            else {
                DB::table('p_components')->insert(
                    array(
                        'id' => $row[0],
                        'kennung' => $row[2],
                        'name' => $row[3]
                    )
                );
                $typ1->PComponents()->attach($row [0],['id'=> Str::uuid()->toString()]);
            }
            
        }
       // $typ1 = PElementTyp::findorfail('49584723-5550-4bbd-ac0b-cb07ca36652a');
        //$typ1->PComponents()->attach('de57b730-5d82-4603-9051-6d0b901735fb',['id'=> Str::uuid()->toString()]); 
    }//end function run
}