<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



use Faker\Factory as Faker;
use Ramsey\Uuid\Type\Decimal;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 

       public function run()
    {
        $faker = Faker::create();
        DB::table('products')->insert([
            'name' => 'Cappaccino',
            'description' => 'Blended with milk and ice, layered on top of whipped cream.',
            'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1937&q=80 width="50px"',
            'price' => 3.99,
            'category' => "cold",
            'stock' => random_int(50,100)
        ]);

    }
}

