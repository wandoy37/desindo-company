<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectCategory::create([
            'title' => 'construction',
            'slug' => 'construction',
        ]);
        ProjectCategory::create([
            'title' => 'design',
            'slug' => 'design',
        ]);
        ProjectCategory::create([
            'title' => 'remodeling',
            'slug' => 'remodeling',
        ]);
        ProjectCategory::create([
            'title' => 'repairs',
            'slug' => 'repairs',
        ]);
    }
}
