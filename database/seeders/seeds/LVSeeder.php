<?php

namespace Database\Seeders\Seeds;


use App\Models\LV;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed 5 Projects
        DB::table('lvs')->insert(
            [
                'id' =>  '1e123069-3d02-4658-b7c7-9f30c8b100a0',
                'name' => "Trockenbau",
                'kennung' => 'TB',
            ],
        );
        DB::table('lvs')->insert(
            [
                'id' =>  '7e6d0092-5cbd-4b9f-8e16-d9ec766cb00e',
                'name' => "Baumeister",
                'kennung' => 'BM',
            ],
        );
        DB::table('lvs')->insert(
            [
                'id' =>  'c7d50ba4-2ee5-4be4-ae39-16c0e265f1a1',
                'name' => "Fliesenleger",
                'kennung' => 'FL',
            ],
        );
        DB::table('lvs')->insert(
            [
                'id' =>  'f92b6522-531b-4780-91fb-4c5d108e45d1',
                'name' => "Tischler",
                'kennung' => 'TI',
            ],
        );
        DB::table('lvs')->insert(
            [
                'id' =>  '0c489dbe-98af-4cc8-9733-d83d2dd0cdc3',
                'name' => "Baumeister",
                'kennung' => 'BM',
            ],
        );
        
        /*
        $lv = new LV;
        $lv->name = "Tischler";
        $lv->kennung = "TI";
        $lv->save();
        */
        $project1 = Project::find('9a4208ba-27da-405c-b484-f386ba48f00b');
        $LV1 =  LV::find('1e123069-3d02-4658-b7c7-9f30c8b100a0');
        $LV2 =  LV::find('7e6d0092-5cbd-4b9f-8e16-d9ec766cb00e');

        $project1->lvs()->save($LV1);
        $project1->lvs()->save($LV2);

    }
}
