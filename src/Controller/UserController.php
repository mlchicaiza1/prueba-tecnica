<?php

namespace App\Controller;

use App\UseCase\SaveUserUseCase;
use App\UseCase\SaveUserRequest;

class UserController
{
    private SaveUserUseCase $saveUserUseCase;

    public function __construct(SaveUserUseCase $saveUserUseCase)
    {
        $this->saveUserUseCase = $saveUserUseCase;
    }

    public function saveUser(array $request): void
    {
        // Crear el DTO a partir de los datos del request
        $saveUserRequest = new SaveUserRequest(
            $request['name'],
            $request['email'],
            $request['password']
        );

        // Ejecutar el caso de uso
        $this->saveUserUseCase->execute($saveUserRequest);
    }
}
