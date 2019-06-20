<?php
namespace Database;


class PDOStatement implements StatementInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function execute(array $param = []): ResultSetInterface
    {
        $this->pdoStatement->execute($param);
        return new PDOResultSet($this->pdoStatement);
    }
}
