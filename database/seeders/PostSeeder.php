<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создание 10 тестовых постов
        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'title' => 'Заголовок поста ' . ($i + 1),
                'content' => 'Текст поста ' . ($i + 1),
            ]);
        }
    }
}

