<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use Faker\Factory as Faker;

class Order_ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('order_items')->insert([
        'order_id' => $faker ->firstName(),
        'product_id' => $faker ->lastName(),
        'amount' => $faker ->random_int (3,9),
        'total_price' => 10.99,
        'sweetener' => 'sugar',
        'topping' => 'cream',
        'flavour' => 'vanilla',
        'milk' => $faker -> boolean(),
        'size' => $faker -> sizeof(),
    
    
        ]);
    }
}
