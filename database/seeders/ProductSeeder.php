<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Susu',
            'sku' => 'FRS-CKLT-001',
            'price' => '2500',
            'stock' => '50',
            'description' => 'Susu Frisian Flag'
        ]);
    }
}
