<?php
class NewCar
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distanceTraveled = 0.0;
    private $timeTraveled = 0.0;
    private $minutesPerKm = 0.0;
    private $fuelPerKm = 0.0;
    public function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->minutesPerKm = 60 / $this->speed;
        $this->fuelPerKm = $this->fuelEconomy / 100;
    }
    public function travelDistance(float $distance)
    {
        $requiredFuel = $this->fuelPerKm * $distance;
        if ($requiredFuel <= $this->fuel) {
            $this->fuel -= $requiredFuel;
            $this->distanceTraveled += $distance;
            $this->timeTraveled += $distance * $this->minutesPerKm;
        } else {
            $possibleDistance = $this->fuel / $this->fuelPerKm;
            $this->distanceTraveled += $possibleDistance;
            $this->fuel = 0;
            $this->timeTraveled += $possibleDistance * $this->minutesPerKm;
        }
    }
    public function refuelLiters(float $fuel)
    {
        $this->fuel += $fuel;
    }
    public function printDistance()
    {
        $formatted = number_format(round($this->distanceTraveled, 1), 1);
        echo "Total Distance: {$formatted}" . PHP_EOL;
    }
    public function printTime()
    {
        $hours = floor($this->timeTraveled / 60);
        $minutes = floor($this->timeTraveled % 60);
        echo "Total Time: {$hours} hours and {$minutes} minutes" . PHP_EOL;
    }
    public function printFuel()
    {
        $formatted = number_format(round($this->fuel, 1), 1);
        echo "Fuel left: {$formatted} liters" . PHP_EOL;
    }
}
$input = array_map("floatval", explode(" ", readline()));
list($speed, $fuel, $fuelEconomy) = $input;
$car = new NewCar($speed, $fuel, $fuelEconomy);

$input = readline();
while ($input !== "END") {
    $commands = explode(" ", $input);
    if (trim($commands[0]) == "Travel") {
        $car->travelDistance(floatval($commands[1]));
    } else if (trim($commands[0]) == "Refuel") {
        $car->refuelLiters(floatval($commands[1]));
    } else if (trim($commands[0]) == "Distance") {
        $car->printDistance();
    } else if (trim($commands[0]) == "Time") {
        $car->printTime();
    } else if (trim($commands[0]) == "Fuel") {
        $car->printFuel();
    }
    $input = readline();
}
