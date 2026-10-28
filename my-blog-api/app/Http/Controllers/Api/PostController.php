<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'category'])->withCount('comments');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest('published_at')->paginate(10);

        return PostResource::collection($posts);
    }

    public function show(string $id)
    {
        $post = Post::with(['user', 'category'])->withCount('comments')->findOrFail($id);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return (new PostResource($post->load(['user', 'category'])))
            ->response()
            ->setStatusCode(201);
    }

    public function update(StorePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->validated());

        return new PostResource($post->load(['user', 'category']));
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Пост успешно удалён'
        ], 200);
    }
}
