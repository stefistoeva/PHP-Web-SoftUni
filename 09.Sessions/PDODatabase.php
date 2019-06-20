<?php
namespace Database;


class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(\PDO $PDO)
    {
        $this->pdo = $PDO;
    }

    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOStatement($stmt);
    }
}