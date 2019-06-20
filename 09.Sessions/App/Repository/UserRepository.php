<?php

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users(email, password) 
            VALUES (?, ?)
        ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword()
        ]);

        return true;
    }

    public function findOneUsername(string $username): \App\Data\UserDTO
    {
        // TODO: Implement findOneUsername() method.
    }
}
