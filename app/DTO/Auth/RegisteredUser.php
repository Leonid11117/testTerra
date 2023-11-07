<?php

namespace App\DTO\Auth;

use App\Models\User;

final class RegisteredUser
{
    public function __construct(
        private string $token,
        private User $user
    ) {}

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
