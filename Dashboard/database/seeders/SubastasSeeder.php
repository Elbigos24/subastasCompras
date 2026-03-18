<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Subasta;

class SubastasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dato1 = new Subasta();
        $dato1->product_id = 1;
        $dato1->start_time = '2024-07-01 10:00:00';
        $dato1->end_time = '2024-07-10 18:00:00';
        $dato1->status = 'active';
        $dato1->save();
    }
}
