<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'author@example.com'],
            ['name' => 'Иван Автор', 'password' => bcrypt('password')]
        );

        $tech = Category::firstOrCreate(['slug' => 'tekhnologii'], ['name' => 'Технологии']);
        $design = Category::firstOrCreate(['slug' => 'dizayn'], ['name' => 'Дизайн']);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $tech->id,
            'title' => 'Первый тестовый пост',
            'slug' => 'pervyy-testovyy-post',
            'excerpt' => 'Краткое описание...',
            'content' => 'Полный текст первого поста.',
            'published_at' => now(),
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $design->id,
            'title' => 'Второй тестовый пост',
            'slug' => 'vtoroy-testovyy-post',
            'excerpt' => 'Описание второго поста...',
            'content' => 'Полный текст второго поста.',
            'published_at' => now(),
        ]);
    }
}
