<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CocktailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('cocktails')->insert([
                'name' => 'モスコミュール',
                'strange' => '23',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
