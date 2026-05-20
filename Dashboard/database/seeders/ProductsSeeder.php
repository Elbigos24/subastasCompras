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
            $dato1->name = 'Reloj de mano';
            $dato1->description = 'Usado, en buen estado';
            $dato1->price = 19.99;
            $dato1->Img = 'producto1.jpg';
            $dato1->stock = 100;
            $dato1->user_id = 1;
            $dato1->save();
            $dato2 = new product();
            $dato2->name = 'CONSOLA DE VIDEOJUEGOS';
            $dato2->description = 'Nuevo, sin usar';
            $dato2->price = 29.99;
            $dato2->Img = 'producto2.jpg';
            $dato2->stock = 50;
            $dato2->user_id = 1;
            $dato2->save();
        
    }
}
