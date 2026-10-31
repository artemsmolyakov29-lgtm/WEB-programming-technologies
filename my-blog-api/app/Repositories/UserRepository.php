<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }

    public function update(int $id, array $data): User
    {
        $user = $this->getById($id);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function delete(int $id): void
    {
        $user = $this->getById($id);
        $user->delete();
    }
}
