<?php

namespace Database\Seeders\gl;


use App\Models\gl\bgl;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BglSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $filename = base_path().'\database\seeders\gl\BglSeeder.csv';
        $fileurls = fopen($filename, 'r');

        $head = fgetcsv($fileurls, 0, ';');

        while (($row = fgetcsv($fileurls, 0, ';')) !=FALSE){

            if ($row[0]==0) 
                {
                    $id = Str::uuid()->toString();  
                }
            else {
                $id = $row[0];   
            }               
            $bgl = bgl::find($id);
            if (!$bgl){
                DB::table('bgls')->insert(
                    array (
                        'id' => $id,               //id
                        'kennung' => $row[2],    //kennung
                        'name' => $row[3],      //name
                    )
                );
            }

            if ($row[1]==!Null) {
                $parent = bgl::find($row[1]);
                $child = bgl::find($row[0]);
                $parent->kids()->save($child);
                unset($parent);
                unset($child);
            }
        }
    }
}
