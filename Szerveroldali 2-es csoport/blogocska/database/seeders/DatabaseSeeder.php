<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10) -> create();
        $posts = Post::factory(20) -> create();
        Tag::factory(5) -> create() -> each(function ($tag) use ($posts) {
            $toAttach = $posts -> pluck('id') -> random(rand(1, 5)) -> toArray();
            $tag -> posts() -> attach($toAttach);
        });
    }
}
