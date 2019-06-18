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

interface Buyer
{
    public function buyFood(): int;

    public function getFood(): int;
}

class Citizen implements future, birthDay, Buyer
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

    /**
     * @var int
     */
    private $food = 0;

    public function __construct(string $name, int $age, string $id, string $birthDay)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDay($birthDay);
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
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

    public function buyFood(): int
    {
        return $this->food += 10;
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

class Rebel implements Buyer
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
    private $group;

    /**
     * @var int
     *
     */
    private $food = 0;

    public function __construct(string $name, int $age, string $group)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGroup($group);
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param string $group
     */
    private function setGroup(string $group): void
    {
        $this->group = $group;
    }

    public function buyFood(): int
    {
        return $this->food += 5;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }
}

$array = [];
$number = intval(readline());
for ($i = 0; $i < $number; $i++) {
    $humanName = readline();
    $tokens = explode(" ", $humanName);
    if (isset($tokens[3])) {
        list($name, $age, $id, $birthDay) = $tokens;
        $array[$name] = new Citizen($name, intval($age), $id, $birthDay);
    } else if (isset($tokens[2])) {
        list($name, $age, $group) = $tokens;
        $array[$name] = new Rebel($name, intval($age), $group);
    }
}

$food = [];
while (true) {
    $humanName = readline();
    if ($humanName === "End") {
        break;
    }
    if (key_exists($humanName, $array)) {
        $human = $array[$humanName];
        $human->buyFood();
        $food[$humanName] = $human->getFood();
    }
}

$sum = array_sum($food);
echo $sum . PHP_EOL;
