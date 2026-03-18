<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Puja;

class PujasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dato1 = new Puja();
        $dato1->subasta_id = 1;
        $dato1->user_id = 1;
        $dato1->amount = 100.00;
        $dato1->day_hour = '2024-07-02 12:00:00';
        $dato1->save();
    }
}
