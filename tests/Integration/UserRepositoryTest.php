<?php

use App\Exception\UserDoesNotExistException;
use PHPUnit\Framework\TestCase;
use App\User;
use App\Repository\UserRepository;

class UserRepositoryTest extends TestCase
{
    public function testSaveAndFindUser(): void
    {
        $userRepository = new UserRepository();

        $user = new User("user test", "user@test.com", "password123");
        $userRepository->save($user);

        $foundUser = $userRepository->getByIdOrFail(1);
        $this->assertNotNull($foundUser);
        $this->assertEquals("user test", $foundUser->getName());
    }

    public function testUpdateUser(): void
    {
        $userRepository = new UserRepository();

        $user = new User("user test", "user@test.com", "password123");
        $userRepository->save($user);

        $user->setName("user test");
        $userRepository->update($user);

        $updatedUser = $userRepository->getByIdOrFail(1);
        $this->assertEquals("user test", $updatedUser->getName());
    }

    public function testDeleteUser(): void
    {
        $userRepository = new UserRepository();

        $user = new User("user test", "user@test.com", "password123");
        $userRepository->save($user);

        $userRepository->delete($user);

        $deletedUser = $userRepository->findById(1);
        $this->assertNull($deletedUser);
    }

    public function testWhenUserIsNotFoundByIdErrorIsThrown(): void
    {
        $this->expectException(UserDoesNotExistException::class);

        $userRepository = new UserRepository();
        $userRepository->getByIdOrFail(1);
    }

    
}
