<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Ikhsan Heriyawan',
            'email' => 'ikhsanheriyawan2404@gmail.com',
            'phone_number' => '082117088123',
            'address' => 'Desa Kempek Blok Penangisan'
        ]);
    }
}
