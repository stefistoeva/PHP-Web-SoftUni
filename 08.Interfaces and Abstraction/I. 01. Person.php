<?php
interface Person
{
    public function setName(string $name): void ;
    public function setAge(int $age): void ;
}

class Citizen implements Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function __toString(): string
    {
        return "{$this->getName()}\n{$this->getAge()}";
    }
}

class Main
{
    public function run()
    {
        $this->readData();
    }

    public function readData()
    {
        $name = readline();
        $age = intval(readline());

        $citizen = new Citizen($name, $age);
        echo $citizen;
    }
}

$main = new Main();
$main->run();

