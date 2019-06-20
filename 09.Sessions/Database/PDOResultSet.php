<?php
namespace Database;


class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className): \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}
