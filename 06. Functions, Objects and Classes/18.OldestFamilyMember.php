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
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }


}

class Family
{
    private $members;

    /**
     * @var Person
     */
    private $oldestMember;

    public function __construct()
    {
        $this->members = [];
        $this->oldestMember = null;
    }

    public function addMember(Person $person): void
    {
        if ($this->oldestMember === null || $this->oldestMember->getAge() < $person->getAge()) {
            $this->oldestMember = $person;
        }
        $this->members[] = $person;
    }

    public function getOldestMember(): ?Person
    {
        return $this->oldestMember;
    }
}

$n = intval(readline());
$family = new Family();
for ($i = 0; $i < $n; $i++) {
    list($name, $age) = explode(" ", readline());
    $person = new Person($name, $age);
    $family->addMember($person);
}
if ($family->getOldestMember() !== null) {
    echo $family->getOldestMember()->getName() . ' ' . $family->getOldestMember()->getAge();
} else {
    echo "There is no older member.";
}
