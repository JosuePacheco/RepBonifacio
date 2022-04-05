<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            "name" => "Vendido",
        ]);

        Status::create([
            "name" => "Disponible",
        ]);

        Status::create([
            "name" => "Transpaso",
        ]);

        Status::create([
            "name" => "Dañado",
        ]);

        Status::create([
            "name" => "Faltante",
        ]);
    }
}
