<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function index()
    {
        $users = $this->repository->getAll();
        return UserResource::collection($users);
    }

    public function show(int $id)
    {
        $user = $this->repository->getById($id);
        return new UserResource($user);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->repository->create($request->validated());

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function update(StoreUserRequest $request, int $id)
    {
        $user = $this->repository->update($id, $request->validated());
        return new UserResource($user);
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Пользователь успешно удалён'
        ]);
    }
}
