<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employe;
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
        Department::factory(3)->create();
        Employe::factory(10)->create();
    }
}
