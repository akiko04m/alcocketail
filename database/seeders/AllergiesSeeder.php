<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AllergiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('allergies')->insert([
                'name' => 'egg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
