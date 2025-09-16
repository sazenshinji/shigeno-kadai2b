<?php

namespace Database\Seeders;

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
        $this->call(SeasonsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SP_ProductsTableSeeder::class);
        $this->call(Product_seasonTableSeeder::class);
        $this->call(SP_Product_seasonTableSeeder::class);
    }
}
