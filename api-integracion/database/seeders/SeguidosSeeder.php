<?php

namespace Database\Seeders;

use App\Models\seguido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeguidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        seguido::factory(10)->create();
    }
}
