<?php
namespace Database;


interface ResultSetInterface
{
    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className): \Generator;
}