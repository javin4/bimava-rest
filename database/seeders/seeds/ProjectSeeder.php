<?php

namespace Database\Seeders\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed 5 Projects
         DB::table('projects')->insert(
            [
                'id' =>  '9a4208ba-27da-405c-b484-f386ba48f00b',
                'name' => "Project1",
                'kennung' => '20.001',
            ],
        );
        DB::table('projects')->insert(
            [
                'id' =>  '4f86bc1e-27b6-4129-9612-fd30f8ee4eb3',
                'name' => "Project2",
                'kennung' => '20.002',
            ],
        );
        DB::table('projects')->insert(
            [
                'id' =>  'eb182706-745c-4c53-a739-4a30963cd4b0',
                'name' => "Project3",
                'kennung' => '21.001',
            ],
        );
        DB::table('projects')->insert(
            [
                'id' =>  'd54177ac-2176-4be0-af85-089345a3633d',
                'name' => "Project4",
                'kennung' => '21.002',
            ],
        );
        DB::table('projects')->insert(
            [
                'id' =>  '3a014f6f-d4db-4a74-a1eb-322ab02d5e39',
                'name' => "Project5",
                'kennung' => '21.003',
            ],
        );
    }
}
