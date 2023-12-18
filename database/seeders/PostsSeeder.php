<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //Posts DUmmy
    Post::create([
      'title' => 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia',
      'slug' => Str::slug('Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', '-'),
      'thumbnail' => 'blog-1.jpg',
      'content' => '<p>
          Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et
          laboriosam eius aut nostrum quidem aliquid dicta.
          Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod
          quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
        </p>',
    ]);

    Post::create([
      'title' => 'Nisi magni odit consequatur autem nulla dolorem',
      'slug' => Str::slug('Nisi magni odit consequatur autem nulla dolorem', '-'),
      'thumbnail' => 'blog-2.jpg',
      'content' => '<p>
              Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et
              laboriosam eius aut nostrum quidem aliquid dicta.
              Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod
              quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
            </p>',
    ]);

    Post::create([
      'title' => 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint',
      'slug' => Str::slug('Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint', '-'),
      'thumbnail' => 'blog-3.jpg',
      'content' => '<p>
              Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et
              laboriosam eius aut nostrum quidem aliquid dicta.
              Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod
              quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
            </p>',
    ]);
  }
}
