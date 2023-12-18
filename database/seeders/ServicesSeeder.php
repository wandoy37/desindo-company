<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create([
            'title' => 'Pembangunan',
        ]);
        Layanan::create([
            'title' => 'Perdagangan',
        ]);
        Layanan::create([
            'title' => 'Perindustrian',
        ]);
        Layanan::create([
            'title' => 'Pengangkutan Darat',
        ]);
        Layanan::create([
            'title' => 'Pertanian',
        ]);
        Layanan::create([
            'title' => 'Percetakan',
        ]);
        Layanan::create([
            'title' => 'Jasa dan Perbengkelan',
        ]);
    }
}
