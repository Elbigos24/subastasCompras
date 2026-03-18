<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usser;

class UssersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dato1 = new Usser();
        $dato1->name = 'Carlos Lopez';
        $dato1->password = bcrypt('password');
        $dato1->email = 'carlos.lopez@example.com';
        $dato1->save();

    }
}
