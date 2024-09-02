<?php

namespace App\UseCase;

use App\Repository\UserRepositoryInterface;
use App\User;

class SaveUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(SaveUserRequest $request): void
    {
        $user = new User($request->getName(), $request->getEmail(), $request->getPassword());
        $this->userRepository->save($user);
    }
}
