<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weeks')->insert([
            [
                'name' => 'Week One',
            ],
            [
                'name' => 'Week Two',
            ],
            [
                'name' => 'Week Three',
            ],
            [
                'name' => 'Week Four',
            ],
            [
                'name' => 'Week Five',
            ],
            [
                'name' => 'Week Six',
            ],
            [
                'name' => 'Week Seven',
            ],
            [
                'name' => 'Week Eight',
            ],
            [
                'name' => 'Week Nine',
            ],
            [
                'name' => 'Week Ten',
            ],
            [
                'name' => 'Week Eleven',
            ],
            [
                'name' => 'Week Twelve',
            ],
        ]);
    }
}
