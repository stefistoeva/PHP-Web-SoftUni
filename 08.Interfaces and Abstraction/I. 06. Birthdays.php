<?php
interface birthDay
{
    public function setBirthDay(string $birthDay);

    public function getBirthDay();

    public function getYear();
}

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

class Citizen implements future, birthDay
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
    private $birthDay;

    public function __construct(string $name, int $age, string $id, string $birthDay)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDay($birthDay);
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

    public function setBirthDay(string $birthday)
    {
        $this->birthDay = $birthday;
    }

    public function getBirthDay()
    {
        return $this->birthDay;
    }

    public function getYear()
    {
        $date = $this->getBirthDay();
        $date = explode("/", $date);
        $year = 0;
        if (isset($date[2])) {
            $year = $date[2];
        }
        return $year;
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

class Pet implements birthDay
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $birthDay;

    public function __construct(string $name, string $birthDay)
    {
        $this->setName($name);
        $this->setBirthDay($birthDay);
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setBirthDay(string $birthDay)
    {
        $this->birthDay = $birthDay;
    }

    public function getBirthDay(): string
    {
        return $this->birthDay;
    }

    public function getYear()
    {
        $date = $this->getBirthDay();
        $date = explode("/", $date);
        $year = 0;
        if (isset($date[2])) {
            $year = $date[2];
        }
        return $year;
    }

}

$array = [];
while (true) {
    $input = readline();
    if ($input === "End") {
        break;
    }
    $tokens = explode(" ", $input);
    if ($tokens[0] === "Citizen") {
        $name = $tokens[1];
        $age = intval($tokens[2]);
        $id = $tokens[3];
        $birthDay = $tokens[4];
        $array[] = new Citizen($name, $age, $id, $birthDay);
    } else if ($tokens[0] === "Robot") {
        continue;
    } else if ($tokens[0] === "Pet") {
        $name = $tokens[1];
        $birthDay = $tokens[2];
        $array[] = new Pet($name, $birthDay);
    }
}

$year = readline();
$haveEqual = false;
foreach ($array as $object) {
    $currentYear = $object->getYear();
    if ($year == $currentYear) {
        echo $object->getBirthDay() . PHP_EOL;
        $haveEqual = true;
    }
}
if ($haveEqual == false) {
    echo "<no output>" . PHP_EOL;
}
