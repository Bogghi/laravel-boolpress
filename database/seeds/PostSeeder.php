<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\posts;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $fake)
    {
        //seeder with faker to populate 10 posts
        for($i = 0; $i < 10; $i++){
            $newPost = new posts;
            $newPost->title = $fake->word();
            $newPost->content = $fake->sentence();
            $newPost->user_id = rand(1,2);
            $newPost->image_path = $fake->imageUrl($with= 640, $height = 480);
            $newPost->save();
        }
    }
}
