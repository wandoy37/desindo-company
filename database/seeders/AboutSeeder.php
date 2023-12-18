<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    About::create([
      'content' => ' <h4>Est 1988</h4>
            <h3>Our Story</h3>
            <p>Inventore aliquam beatae at et id alias. Ipsa dolores amet consequuntur minima quia maxime autem.
              Quidem id sed ratione. Tenetur provident autem in reiciendis rerum at dolor. Aliquam consectetur
              laudantium temporibus dicta minus dolor.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commo</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
            </ul>
            <p>Vitae autem velit excepturi fugit. Animi ad non. Eligendi et non nesciunt suscipit repellendus porro in
              quo eveniet. Molestias in maxime doloremque.</p>',
      'image' => 'about-1.jpg',
      'youtube' => 'https://www.youtube.com/embed/VsMg_u1HEoc',
    ]);
  }
}
