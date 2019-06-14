<?php
interface Person
{
    public function setName(string $name): void ;
    public function setAge(int $age): void ;
}

interface Identifiable
{
    public function setId(string $id): void;
}

interface Birthable
{
    public function setBirthDate(string $birthDate): void;
}

class Citizen implements Person, Identifiable, Birthable
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

    /**
     * @var string
     */
    private $birthDate;

    public function __construct(string $name, int $age, string $id,string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
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

    public function setId(string $id):void
    {
        $this->id = $id;
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function __toString(): string
    {
        return "{$this->getName()}\n{$this->getAge()}\n{$this->getId()}\n{$this->getBirthDate()}";
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
        $identifiable = readline();
        $birthDate = readline();

        $citizen = new Citizen($name, $age, $identifiable, $birthDate);
        echo $citizen;
    }
}

$main = new Main();
$main->run();
