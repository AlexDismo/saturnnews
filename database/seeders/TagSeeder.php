<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Fashion', 'Technology', 'Travel', 'Food', 'Lifestyle', 'Fitness', 'DIY', 'Finance', 'Politics', 'Parenting', 'Business', 'Personal', 'Movie', 'Music', 'Health'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
