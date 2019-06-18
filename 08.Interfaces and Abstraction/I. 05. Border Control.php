<?php

interface future
{
    public function setName(string $name);

    public function setId(string $id);

    public function getId();
}

interface RobotFactory
{
    public function robots();
}

class Citizen implements future
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}

class Robot implements future
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $name, string $id)
    {
        $this->setName($name);
        $this->setId($id);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}

$array = [];
$input = readline();
while ($input !== "End") {
    $tokens = explode(" ", $input);
    if (isset($tokens[2])) {
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $id = $tokens[2];
        $array[] = new Citizen($name, $age, $id);
    } else if (isset($tokens[1])) {
        $model = $tokens[0];
        $id = $tokens[1];
        $array[] = new Robot($model, $id);
    }
    $input = readline();
}

$number = intval(readline());
$length = -strlen($number);

foreach ($array as $object) {
    $objectsId = $object->getId();
    if ($number == substr($objectsId, $length)) {
        echo $objectsId . PHP_EOL;
    }
}
