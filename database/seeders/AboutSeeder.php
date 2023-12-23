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
      'address' => 'Jl. PM Noor Bumi Sempaja Ruko Griya Niaga 3 AL/AM Kota Samarinda Provinsi Kalimantan Timur, 75119',
      'email' => 'desindo.staf@gmail.com',
      'number_phone' => '(+62) 821 4872 2747',
      'maps' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.772907990471!2d117.167266!3d-0.453711!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df679895b9ee773%3A0xa87aaddb16730689!2sPT%20Desindo%20Agri%20Mandiri!5e0!3m2!1sid!2sid!4v1702901663273!5m2!1sid!2sid',
      'logo' => 'logo.png',
    ]);
  }
}
