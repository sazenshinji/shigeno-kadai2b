<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '春',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('seasons')->insert($param);
        $param = [
            'name' => '夏',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('seasons')->insert($param);
        $param = [
            'name' => '秋',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('seasons')->insert($param);
        $param = [
            'name' => '冬',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('seasons')->insert($param);
    }
}
