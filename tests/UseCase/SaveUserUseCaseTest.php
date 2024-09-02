<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\SaveUserUseCase;
use App\UseCase\SaveUserRequest;
use App\Repository\UserRepositoryInterface;
use App\User;

class SaveUserUseCaseTest extends TestCase
{
    public function testExecute(): void
    {
        // Mock del repositorio
        $userRepository = $this->createMock(UserRepositoryInterface::class);

        // Esperamos que el método save sea llamado una vez con cualquier instancia de User
        $userRepository->expects($this->once())
                       ->method('save')
                       ->with($this->isInstanceOf(User::class));

        $useCase = new SaveUserUseCase($userRepository);

        // Crear un request con datos de usuario
        $request = new SaveUserRequest("user test", "user@test.com", "password123");

        // Ejecutar el caso de uso
        $useCase->execute($request);
    }
}
