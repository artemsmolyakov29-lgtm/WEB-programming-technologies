<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = Post::with(['user', 'category'])->withCount('comments');

        if (isset($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        return $query->latest('published_at')->paginate(10);
    }

    public function getById(int $id): Post
    {
        return Post::with(['user', 'category'])->withCount('comments')->findOrFail($id);
    }

    public function create(array $data): Post
    {
        $post = Post::create($data);
        return $post->load(['user', 'category']);
    }

    public function update(int $id, array $data): Post
    {
        $post = $this->getById($id);
        $post->update($data);
        return $post->load(['user', 'category']);
    }

    public function delete(int $id): void
    {
        $post = $this->getById($id);
        $post->delete();
    }
}
