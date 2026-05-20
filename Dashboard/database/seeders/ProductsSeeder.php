<?php

namespace Database\Seeders;

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
            Product::create([
                'name' => 'Reloj de mano',
                'description' => 'Usado, en buen estado',
                'price' => 19.99,
                'Img' => 'producto1.jpg',
                'stock' => 100,
                'user_id' => 1,
                'slug' => 'reloj-de-mano',
            ]);

            Product::create([
                'name' => 'CONSOLA DE VIDEOJUEGOS',
                'description' => 'Nuevo, sin usar',
                'price' => 29.99,
                'Img' => 'producto2.jpg',
                'stock' => 50,
                'user_id' => 1,
                'slug' => 'consola-de-videojuegos',
            ]);

        
        
    }
}
