<?php

namespace App\Repository;

use App\Exception\UserDoesNotExistException;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private array $users = [];
    private int $nextId = 1; 

    public function save(User $user): void
    {
        $reflection = new \ReflectionClass($user);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($user, $this->nextId);

        $this->users[$this->nextId] = $user;
        $this->nextId++;
    }

    public function update(User $user): void
    {
        $userId = $user->getId();
        if (isset($this->users[$userId])) {
            $this->users[$userId] = $user;
        }
    }

    public function delete(User $user): void
    {
        $userId = $user->getId();
        if (isset($this->users[$userId])) {
            unset($this->users[$userId]);
        }
    }

    public function findById(int $id): ?User
    {
        return $this->users[$id] ?? null;
    }

    public function getByIdOrFail(int $id): User
    {
        $user = $this->findById($id);
        if ($user === null) {
            throw new UserDoesNotExistException();
        }
        return $user;
    }
}
