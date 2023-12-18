<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'image' => 'hero-carousel-1.jpg',
        ]);
        HeroSection::create([
            'image' => 'hero-carousel-2.jpg',
        ]);
        HeroSection::create([
            'image' => 'hero-carousel-3.jpg',
        ]);
        HeroSection::create([
            'image' => 'hero-carousel-4.jpg',
        ]);
        HeroSection::create([
            'image' => 'hero-carousel-5.jpg',
        ]);
    }
}
