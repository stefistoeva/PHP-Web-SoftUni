<?php
class Information
{
    private $name;
    private $company = null;
    private $car = null;
    private $multipleParents = [];
    private $children = [];
    private $pokemon = [];

    /**
     * Information constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @param Car $car
     */
    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    /**
     * @param Parents $multipleParents
     */
    public function setMultipleParents(Parents $multipleParents): void
    {
        $this->multipleParents[] = $multipleParents;
    }

    /**
     * @param Children $children
     */
    public function setChildren(Children $children): void
    {
        $this->children[] = $children;
    }

    /**
     * @param NewPokemon $pokemon
     */
    public function setPokemon(NewPokemon $pokemon): void
    {
        $this->pokemon[] = $pokemon;
    }

    public function __toString(): string
    {
        return $this->name . PHP_EOL . 'Company:' . ($this->company ? PHP_EOL . $this->company : '')  . PHP_EOL . 'Car:' . ($this->car ? PHP_EOL . $this->car : '')
        . PHP_EOL . 'Pokemon:' . PHP_EOL . implode(PHP_EOL, $this->pokemon)
        . PHP_EOL . 'Parents:' . (count($this->multipleParents) ? PHP_EOL . implode(PHP_EOL, $this->multipleParents) : '')
        . PHP_EOL . 'Children:' .(count($this->children) ? PHP_EOL . implode(PHP_EOL, $this->children): '');
    }
}

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString(): string
    {
        $salary = number_format($this->salary, 2, '.', '');
        return "{$this->companyName} {$this->department} {$salary}";
    }
}

class NewPokemon
{
    private $pokemonName;
    private $pokemonType;

    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }

    public function __toString(): string
    {
        return "{$this->pokemonName} {$this->pokemonType}";
    }
}

class Children
{
    private $childName;
    private $childBirthday;

    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBirthday = $childBirthday;
    }

    public function __toString(): string
    {
        return "{$this->childName} {$this->childBirthday}";
    }
}

class Parents
{
    private $parentName;
    private $parentBirthday;

    public function __construct(string $parentName, string $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }

    public function __toString(): string
    {
        return "{$this->parentName} {$this->parentBirthday}";
    }
}

class Car
{
    private $carModel;
    private $carSpeed;

    public function __construct(string $carModel, float $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }

    public function __toString(): string
    {
        return "{$this->carModel} {$this->carSpeed}";
    }
}

$arrayOfPeople = [];
$input = readline();
while ($input !== "End") {
    $information = explode(" ", $input);
    $name = $information[0];
    $element = $information[1];
    $person = new Information($name);
    if ($element === "company") {
        $companyName = $information[2];
        $department = $information[3];
        $salary = floatval($information[4]);
        $company = new Company($companyName, $department, $salary);
        if (!key_exists($name, $arrayOfPeople)) {
            $person->setCompany($company);
            $arrayOfPeople[$name] = $person;
        } else {
            $arrayOfPeople[$name]->setCompany($company);
        }
    } else if ($element === "pokemon") {
        $pokemonName = $information[2];
        $pokemonType = $information[3];
        $pokemon = new NewPokemon($pokemonName, $pokemonType);
        if (!key_exists($name, $arrayOfPeople)) {
            $person->setPokemon($pokemon);
            $arrayOfPeople[$name] = $person;
        } else {
            $arrayOfPeople[$name]->setPokemon($pokemon);
        }
    } else if ($element === "parents") {
        $parentName = $information[2];
        $parentBirthday = $information[3];
        $parent = new Parents($parentName, $parentBirthday);
        if (!key_exists($name, $arrayOfPeople)) {
            $person->setMultipleParents($parent);
            $arrayOfPeople[$name] = $person;
        } else {
            $arrayOfPeople[$name]->setMultipleParents($parent);
        }
    } else if ($element === "children") {
        $childName = $information[2];
        $childBirthday = $information[3];
        $child = new Children($childName, $childBirthday);
        if (!key_exists($name, $arrayOfPeople)) {
            $person->setChildren($child);
            $arrayOfPeople[$name] = $person;
        } else {
            $arrayOfPeople[$name]->setChildren($child);
        }
    } else if ($element === "car") {
        $carModel = $information[2];
        $carSpeed = floatval($information[3]);
        $car = new Car($carModel, $carSpeed);
        if (!key_exists($name, $arrayOfPeople)) {
            $person->setCar($car);
            $arrayOfPeople[$name] = $person;
        } else {
            $arrayOfPeople[$name]->setCar($car);
        }
    }
    $input = readline();
}

$nameToPrint = readline();
echo $arrayOfPeople[$nameToPrint] . PHP_EOL;
