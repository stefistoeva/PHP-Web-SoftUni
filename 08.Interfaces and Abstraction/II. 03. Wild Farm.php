<?php
abstract class Food
{
    /**
     * @var int
     */
    private $quantity;

    protected function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @param int $quantity
     */
    private function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public abstract function getClassName(): string ;
}

class Meat extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function getClassName(): string
    {
        $func = new ReflectionClass($this);
        return $func->getName();
    }
}

class Vegetable extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function getClassName(): string
    {
        $func = new ReflectionClass($this);
        return $func->getName();
    }
}

interface FoodFactoryInterface
{
    public static function create(string $type, int $quantity): Food;
}

class FoodFactory implements FoodFactoryInterface
{
    /**
     * @param string $type
     * @param int $quantity
     * @return Food
     */
    public static function create(string $type, int $quantity): Food
    {
        if (class_exists($type)) {
            return new $type($quantity);
        }
        return null;
    }
}
abstract class Animal
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var int
     */
    private $foodEaten;

    /**
     * Animal constructor.
     * @param string $name
     * @param string $type
     * @param float $weight
     */
    public function __construct(string $name,
                                string $type,
                                float $weight)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setWeight($weight);
        $this->setFoodEaten(0);
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    private function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getFoodEaten(): int
    {
        return $this->foodEaten;
    }

    /**
     * @param int $quantity
     */
    protected function setFoodEaten(int $quantity): void
    {
        $this->foodEaten += $quantity;
    }

    public abstract function makeSound(): void;
    public abstract function eat(Food $food): void;
}

interface AnimalFactoryInterface
{
    public static function create(array $data): Animal;
}

class AnimalFactory implements AnimalFactoryInterface
{
    public static function create(array $data): Animal
    {
        $type = $data[0];
        $name = $data[1];
        $weight = floatval($data[2]);
        $livingRegion = $data[3];

        switch (strtolower($type)) {
            case "cat":
                $breed = $data[4];
                return new Cat($name, $type, $weight, $livingRegion, $breed);
            case "zebra":
                return new Zebra($name, $type, $weight, $livingRegion);
            case "tiger":
                return new Tiger($name, $type, $weight, $livingRegion);
            case "mouse":
                return new Mouse($name, $type, $weight, $livingRegion);
            default:
                return null;
        }
    }
}

abstract class Mammal extends Animal
{
    /**
     * @var string
     */
    private $livingRegion;

    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    private function setLivingRegion(string $livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}

class Zebra extends Mammal
{
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "Zs\n";
    }

    /**
     * @param Food $food
     * @throws ReflectionException
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $class = new \ReflectionClass($this);
        $className = $class->getName();
        if ("Vegetable" !== $food->getClassName()) {
            throw new Exception($className . "s are not eating that type of food!");
        }
        $this->setFoodEaten($food->getQuantity());
    }
}

class Mouse extends Mammal
{
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "SQUEEEAAAK!\n";
    }

    /**
     * @param Food $food
     * @throws ReflectionException
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $class = new \ReflectionClass($this);
        $className = $class->getName();
        if ("Vegetable" !== $food->getClassName()) {
            throw new Exception($className . "s are not eating that type of food!");
        }
        $this->setFoodEaten($food->getQuantity());
    }
}

abstract class Felime extends Mammal
{
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }
}

class Tiger extends Felime
{
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $class = new \ReflectionClass($this);
        $className = $class->getName();
        if ("Meat" !== $food->getClassName()) {
            throw new Exception($className . "s are not eating that type of food!");
        }
        $this->setFoodEaten($food->getQuantity());
    }
}

class Cat extends Felime
{
    /**
     * @var string
     */
    private $breed;

    public function __construct(string $name, string $type, float $weight, string $livingRegion, string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);
    }

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }


    public function makeSound(): void
    {
        echo "Meowwww\n";
    }

    public function eat(Food $food): void
    {
        $this->setFoodEaten($food->getQuantity());
    }

    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %s, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getBreed(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}

class Main
{
    const INPUT_END_COMMAND = "End";

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $input = readline();
        while ($input !== self::INPUT_END_COMMAND) {
            $animalData = explode(" ", $input);
            $animal = AnimalFactory::create($animalData);

            $foodData = explode(" ", readline());
            $foodType = $foodData[0];
            $footQuantity = intval($foodData[1]);
            $food = FoodFactory::create($foodType, $footQuantity);

            $animal->makeSound();

            try {
                $animal->eat($food);
            } catch (Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
            echo $animal;
            $input = readline();
        }
    }
}

$main = new Main();
$main->run();
