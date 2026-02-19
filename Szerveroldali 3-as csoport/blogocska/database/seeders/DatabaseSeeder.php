<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
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
        $categories = Category::factory(5) -> create();
        $articles = Article::factory(20) -> create();
        foreach ($categories as $category){
            $toAttach = $articles -> pluck('id') -> random(rand(1, 5)) -> toArray();
            $category -> articles() -> attach($toAttach);
        }
    }
}
