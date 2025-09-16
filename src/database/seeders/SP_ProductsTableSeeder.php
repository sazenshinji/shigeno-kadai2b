<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SP_ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '(得) キウイ',
            'price' => 400,
            'image' => 'images_sp/kiwi_sp.png',
            'description' => 'キウイの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) ストロベリー',
            'price' => 600,
            'image' => 'images_sp/strawberry_sp.png',
            'description' => 'ストロベリーの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) オレンジ',
            'price' => 430,
            'image' => 'images_sp/orange_sp.png',
            'description' => 'オレンジの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) スイカ',
            'price' => 350,
            'image' => 'images_sp/watermelon_sp.png',
            'description' => 'スイカの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) ピーチ',
            'price' => 500,
            'image' => 'images_sp/peach_sp.png',
            'description' => 'ピーチの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) シャインマスカット',
            'price' => 700,
            'image' => 'images_sp/muscat_sp.png',
            'description' => 'シャインマスカットの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) パイナップル',
            'price' => 400,
            'image' => 'images_sp/pineapple_sp.png',
            'description' => 'パイナップルの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) ブドウ',
            'price' => 550,
            'image' => 'images_sp/grapes_sp.png',
            'description' => 'ブドウの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) バナナ',
            'price' => 300,
            'image' => 'images_sp/banana_sp.png',
            'description' => 'バナナの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
        $param = [
            'name' => '(得) メロン',
            'price' => 480,
            'image' => 'images_sp/melon_sp.png',
            'description' => 'メロンの特価品です。',
            'created_at' => Carbon::create(2025, 8, 26, 12, 0, 0),
            'updated_at' => Carbon::create(2025, 8, 26, 12, 0, 0)
        ];
        DB::table('sp_products')->insert($param);
    }
}
