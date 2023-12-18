<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Project::create([
            'title' => 'construction-1',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'construction-1.jpg',
            'category_id' => '1',
        ]);

        Project::create([
            'title' => 'design-1',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'design-1.jpg',
            'category_id' => '2',
        ]);

        Project::create([
            'title' => 'remodeling-1',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'remodeling-1.jpg',
            'category_id' => '3',
        ]);

        Project::create([
            'title' => 'repairs-1',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'repairs-1.jpg',
            'category_id' => '4',
        ]);

        // 2
        Project::create([
            'title' => 'construction-2',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'construction-2.jpg',
            'category_id' => '1',
        ]);

        Project::create([
            'title' => 'design-2',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'design-2.jpg',
            'category_id' => '2',
        ]);

        Project::create([
            'title' => 'remodeling-2',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'remodeling-2.jpg',
            'category_id' => '3',
        ]);

        Project::create([
            'title' => 'repairs-2',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'repairs-2.jpg',
            'category_id' => '4',
        ]);

        // 3
        Project::create([
            'title' => 'construction-3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'construction-3.jpg',
            'category_id' => '1',
        ]);

        Project::create([
            'title' => 'design-3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'design-3.jpg',
            'category_id' => '2',
        ]);

        Project::create([
            'title' => 'remodeling-3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'remodeling-3.jpg',
            'category_id' => '3',
        ]);

        Project::create([
            'title' => 'repairs-3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur',
            'image' => 'repairs-3.jpg',
            'category_id' => '4',
        ]);
    }
}
