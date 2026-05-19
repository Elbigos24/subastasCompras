<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $dati1 = new compra();
        $dati1->user_id = 1;
        $dati1->product_id = 1;
        $dati1->quantity = 2;
        $dati1->total_price = 39.98;
        $dati1->save();
    }
}
