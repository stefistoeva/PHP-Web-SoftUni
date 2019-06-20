<?php

use App\Data\UserDTO;

interface UserSeviceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword): bool;
}