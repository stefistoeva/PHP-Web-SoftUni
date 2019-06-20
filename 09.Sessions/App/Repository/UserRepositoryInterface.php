<?php

use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): bool;
    public function findOneUsername(string $username): UserDTO;
}