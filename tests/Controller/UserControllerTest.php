<?php

use PHPUnit\Framework\TestCase;
use App\Controller\UserController;
use App\UseCase\SaveUserUseCase;
use App\UseCase\SaveUserRequest;

class UserControllerTest extends TestCase
{
    public function testSaveUser(): void
    {
        // Mock del caso de uso
        $saveUserUseCase = $this->createMock(SaveUserUseCase::class);

        $saveUserUseCase->expects($this->once())
                        ->method('execute')
                        ->with($this->isInstanceOf(SaveUserRequest::class));

        $userController = new UserController($saveUserUseCase);

        $requestData = [
            'name' => 'user test',
            'email' => 'user@test.com',
            'password' => 'password123'
        ];

        // Ejecutar el método del controlador
        $userController->saveUser($requestData);
    }
}
