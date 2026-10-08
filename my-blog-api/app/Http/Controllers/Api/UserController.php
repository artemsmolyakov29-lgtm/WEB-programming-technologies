<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private array $users = [
        ['id' => 1, 'name' => 'Иван Петров', 'email' => 'ivan@example.com'],
        ['id' => 2, 'name' => 'Елена Смирнова', 'email' => 'elena@example.com'],
    ];

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->users,
        ]);
    }

    public function show(int $id)
    {
        $user = collect($this->users)->firstWhere('id', $id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Пользователь не найден'], 404);
        }

        return response()->json(['success' => true, 'data' => $user]);
    }
}