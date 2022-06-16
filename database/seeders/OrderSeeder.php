<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('orders')->insert([
        'id' => $faker ->firstName(),
        'user_id' => $faker ->lastName(),
        'order_items_id' => $faker ->streetName(),
       
        ]);
    }
}
