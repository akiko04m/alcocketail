<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
        // DB::table('テーブル名')->insert(['カラム名' => 'データ' ] );
    // use Illuminate\Support\Facades\DB;　を追記
    // use DateTime;　を追記

    public function run(): void
    {
            DB::table('cocktails')->insert([
                    'name' => 'お酒',
                    'strange' => '5',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
            ]);
    }
}
