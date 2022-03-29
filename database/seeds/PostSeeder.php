<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str; // Serve per importare l'Helper usato per lo slug

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $post = new Post();

            $post->title =$faker->text(20);
            $post->content =$faker->paragraph(2, false); // Crea due paragrafi, mettendo false mi da due paragrafi, con True invece restituisce un array
            $post->image =$faker->imageUrl(250, 250);
            $post->slug=Str::slug($post->title, '-');
            $post->save();
        }
    }
}
