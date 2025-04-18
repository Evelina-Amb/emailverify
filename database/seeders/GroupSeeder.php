<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Seed the database with groups.
     */
    public function run()
    {
        $groups = [
            ['code' => 'G1', 'name' => 'IT'],
            ['code' => 'G2', 'name' => 'Administravimas'],
            ['code' => 'G3', 'name' => 'Programavimas'],
            ['code' => 'G4', 'name' => 'Dizainas'],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
