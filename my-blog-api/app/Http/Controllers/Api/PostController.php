<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        private PostRepository $repository
    ) {}

    public function index(Request $request)
    {
        $posts = $this->repository->getAll($request->only('category'));
        return PostResource::collection($posts);
    }

    public function show(int $id)
    {
        $post = $this->repository->getById($id);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->repository->create($request->validated());

        return (new PostResource($post))
            ->response()
            ->setStatusCode(201);
    }

    public function update(StorePostRequest $request, int $id)
    {
        $post = $this->repository->update($id, $request->validated());
        return new PostResource($post);
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Пост успешно удалён'
        ], 200);
    }
}
