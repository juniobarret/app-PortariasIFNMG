<?php

namespace Database\Seeders;

use App\Models\Portaria;
use App\Models\Servidor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortariaServidoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servidores = Servidor::all();
        $portarias = Portaria::all();
        for ($i=0; $i < 40; $i++) { 
            $servidor = $servidores->random();
            $portaria = $portarias->random();
            $portaria->servidores()->attach($servidor);
        }

    }
}
