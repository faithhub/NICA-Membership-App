<?php

namespace Database\Seeders;

use App\Models\Schools;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schools::factory()
            ->count(5)
            ->create();
    }
}
