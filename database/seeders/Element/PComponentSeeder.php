<?php

namespace Database\Seeders\Element;

use Illuminate\Database\Seeder;
use App\Models\Element\PComponent;
use Illuminate\Support\Facades\DB;

class PComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $filename = base_path().'\database\seeders\Element\PComponentSeeder.csv';
        $fileurls = fopen($filename, 'r');
        fgetcsv($fileurls, 0, ';'); //ignor first row...
        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){

            if ($row[0]==0){
                $ek = PComponent::create([
                    'kennung' => $row [1],
                    'name' => $row[2]
                ]);
            }
            else {
                DB::table('p_components')->insert(
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