<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private array $posts = [
        [
            'id' => 1,
            'title' => 'Запуск новой версии нашего портала',
            'excerpt' => 'Мы рады сообщить о выходе обновлённой платформы...',
            'content' => 'Мы рады сообщить, что сегодня состоялся официальный запуск обновлённой версии...',
            'date' => '2026-09-08',
            'category' => 'Технологии',
            'author' => 'Администратор',
            'image' => 'https://picsum.photos/seed/post1/600/400',
        ],
        [
            'id' => 2,
            'title' => 'Как выбрать идеальный шрифт для сайта',
            'excerpt' => 'Типографика играет ключевую роль в восприятии контента...',
            'content' => 'Выбор шрифта — это искусство...',
            'date' => '2026-09-07',
            'category' => 'Дизайн',
            'author' => 'Дизайнер',
            'image' => 'https://picsum.photos/seed/post2/600/400',
        ],
        [
            'id' => 3,
            'title' => 'Обзор новых возможностей Vue',
            'excerpt' => 'Фреймворк Vue.js продолжает развиваться...',
            'content' => 'Vue 3 привнёс Composition API...',
            'date' => '2026-09-06',
            'category' => 'Разработка',
            'author' => 'Разработчик',
            'image' => 'https://picsum.photos/seed/post3/600/400',
        ],
    ];

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->posts,
            'total' => count($this->posts),
        ]);
    }

    public function show(int $id)
    {
        $post = collect($this->posts)->firstWhere('id', $id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Пост не найден',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Пост создан (заглушка)',
            'data' => $request->all(),
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'success' => true,
            'message' => "Пост $id обновлён (заглушка)",
            'data' => $request->all(),
        ]);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'success' => true,
            'message' => "Пост $id удалён (заглушка)",
        ]);
    }
}