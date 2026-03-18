<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $dato1 = new product();
            $dato1->name = 'Producto 1';
            $dato1->description = 'Descripción del producto 1';
            $dato1->price = 19.99;
            $dato1->image = 'producto1.jpg';
            $dato1->stock = 100;
            $dato1->category_id = 1;
            $dato1->save();
    }
}
