<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Paleidžiame miestų seederį 
        $this->call(CitySeeder::class);

        // Paleidžiame grupių seederį
        $this->call(GroupSeeder::class);

        // Paleidžiame studentų seederį
        $this->call(StudentSeeder::class);
    }
}
