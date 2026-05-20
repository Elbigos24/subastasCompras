<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dato1 = new User();
        $dato1->name = 'Carlos Lopez';
        $dato1->password = bcrypt('password');
        $dato1->email = 'carlos.lopez@example.com';
        $dato1->save();

    }
}
