<?php

namespace Database\Seeders\Element;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Element\PElementTyp;

class PElementTypSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $filename = base_path().'\database\seeders\Element\PElementTypSeeder.csv';
        $fileurls = fopen($filename, 'r');
   
        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){

            if ($row[0]==0){
                $ek = PElementTyp::create([
                    'kennung' => $row [1],
                    'name' => $row[2]
                ]);
            }
            else {
                DB::table('p_elementtyps')->insert(
                    array(
                        'id' => $row[0],
                        'kennung' => $row[1],
                        'name' => $row[2]
                    )
                );
            }
        }
    }//end function run
}