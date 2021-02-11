<?php

namespace Database\Seeders\Element;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PElementTypSeeder extends Seeder{

    public function run(){
        $filename = base_path().'\database\seeders\Element\PElementTypSeeder.csv';
        $fileurls = fopen($filename, 'r');
        
        $head = fgetcsv($fileurls, 0, ';');

        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){
            if ($row[0]==0) $id = Str::uuid()->toString();  
            else $id = $row[0];   
            DB::table('p_elementtyps')->insert(
                array(
                    $head[0] => $id,
                    'kennung' => $row[1],
                    'name' => $row[2],
                    'ehp_override' => $row[3]
                )
            );
        }
    }//end function run
}