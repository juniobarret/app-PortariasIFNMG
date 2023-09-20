<?php

namespace Database\Seeders;

use App\Models\Portaria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portaria::factory()->count(20)->create();
    }
}
