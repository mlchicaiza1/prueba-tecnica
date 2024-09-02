<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\UserController;
use App\UseCase\SaveUserUseCase;
use App\Repository\UserRepository;

$requestData = [
    'name' => 'user test',
    'email' => 'user@test.com',
    'password' => 'password123'
];

//Dependencias
$userRepository = new UserRepository();
$saveUserUseCase = new SaveUserUseCase($userRepository);

//Controlador y  caso de uso
$userController = new UserController($saveUserUseCase);

//Guardar el usuario
$userController->saveUser($requestData);

echo "User saved successfully!";
