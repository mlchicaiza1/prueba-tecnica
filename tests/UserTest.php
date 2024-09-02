<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User("user test", "user@test.com", "password123");

        $this->assertEquals("user test", $user->getName());
        $this->assertEquals("user@test.com", $user->getEmail());
    }

    public function testSetters(): void
    {
        $user = new User("user test", "user@test.com", "password123");
        $user->setName("user test");
        $user->setEmail("user@test.com");
        $this->assertEquals("user test", $user->getName());
        $this->assertEquals("user@test.com", $user->getEmail());
    }
}
