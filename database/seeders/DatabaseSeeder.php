<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(gl\BglSeeder::class);

        $this->call(seeds\ProjectSeeder::class);
        $this->call(seeds\LVSeeder::class);
        $this->call(seeds\PPhaseSeeder::class);
        $this->call(Element\PElementTypSeeder::class);
        $this->call(Element\PComponentSeeder::class);
        $this->call(Element\PElementSeeder::class);
        
        $this->call(ON\ONPositionSeeder::class);
        
    }
}
