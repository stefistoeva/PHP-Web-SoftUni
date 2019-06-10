<?php
class Car
{
    public $model;
    /**
     * @var Engine
     */
    public $engine;
    public $weight;
    public $color;

    public function __construct($model, $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function __toString()
    {
        return $this->model.':'.PHP_EOL . '  ' .$this->engine->model .':'.PHP_EOL
            .'    Power: '.$this->engine->power.PHP_EOL
            .'    Displacement: '.$this->engine->displacement.PHP_EOL
            .'    Efficiency: '.$this->engine->efficiency.PHP_EOL
            .'  Weight: '.$this->weight.PHP_EOL
            .'  Color: '.$this->color.PHP_EOL;
    }
}

class Engine
{
    public $model;
    public $power;
    public $displacement;
    public $efficiency;

    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
}

$lineOfEngine = intval(readline());
$arrayOfEngine = [];
for ($i = 0; $i < $lineOfEngine; $i++) {
    $engine = explode(" ", trim(readline()));
    list($model, $power) = $engine;
    $displacement = 'n/a';
    $efficiency = 'n/a';
    if (isset($engine[2], $engine)) {
        if (preg_match('/^[0-9]+$/', $engine[2])) {
            $displacement = $engine[2];
        } else {
            $efficiency = $engine[2];
        }
        if (isset($engine[3], $engine)) {
            if (preg_match('/^[0-9]+$/', $engine[3])) {
                $displacement = $engine[3];
            } else {
                $efficiency = $engine[3];
            }
        }
    }
    $arrayOfEngine[] = new Engine($model, $power, $displacement, $efficiency);
}

$lineOfCars = intval(readline());
$arrayOfCars = [];
for ($i = 0; $i < $lineOfCars; $i++) {
    $cars = explode(" ", trim(readline()));
    $engineModel = '';
    /**
     * @var Engine $engine
     */
    foreach ($arrayOfEngine as $engine) {
        if ($engine->model === $cars[1]) {
            $engineModel = $engine;
            break;
        }
    }
    $model = $cars[0];
    $weight = 'n/a';
    $color = 'n/a';
    if (isset($cars[2], $cars)) {
        if (preg_match('/^[0-9]+$/', $cars[2])) {
            $weight = $cars[2];
        } else {
            $color = $cars[2];
        }
    }
    if (isset($cars[3], $cars)) {
        if (preg_match('/^[0-9]+$/', $cars[3])) {
            $weight = $cars[3];
        } else {
            $color = $cars[3];
        }
    }
    $arrayOfCars[] = new Car($model, $engineModel, $weight, $color);
}

/**
 * @var Car $car
 */
foreach ($arrayOfCars as $car) {
    echo $car;
}
