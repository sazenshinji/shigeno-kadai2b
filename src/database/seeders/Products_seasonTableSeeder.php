<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Products_seasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'product_id' => 1,
            'season_id' => 4,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 2,
            'season_id' => 1,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 3,
            'season_id' => 4,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 4,
            'season_id' => 2,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 5,
            'season_id' => 2,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 6,
            'season_id' => 3,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 7,
            'season_id' => 3,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 8,
            'season_id' => 3,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 9,
            'season_id' => 3,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
        $param = [
            'product_id' => 10,
            'season_id' => 2,
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('products_season')->insert($param);
    }
}
