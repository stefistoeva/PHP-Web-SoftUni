<?php

class Person
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
     * People constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function __toString(): string
    {
        return "{$this->getName()} - {$this->getAge()}";
    }
}

$line = intval(readline());
$arrayOfPeople = [];
for ($i = 0; $i < $line; $i++) {
    list($name, $age) = explode(" ", readline());
    $age = intval($age);
    if ($age > 30) {
        $arrayOfPeople[] = new Person($name, $age);
    }
}

usort($arrayOfPeople, function (Person $name1, Person $name2) {
    return $name1->getName() <=> $name2->getName();
});

foreach ($arrayOfPeople as $arrayOfPerson) {
    echo $arrayOfPerson . PHP_EOL;
}
