<?php
class Car
{
    private $carsModel;
    private $fuelAmount;
    private $fuelCostPerKm;
    private $distanceTraveled = 0;

    public function __construct(string $carsModel, int $fuelAmount, float $fuelCostPerKm)
    {
        $this->setCarsModel($carsModel);
        $this->setFuelAmount($fuelAmount);
        $this->setFuelCostPerKm($fuelCostPerKm);
    }

    /**
     * @return mixed
     */
    public function getCarsModel()
    {
        return $this->carsModel;
    }

    /**
     * @param mixed $carsModel
     */
    private function setCarsModel($carsModel): void
    {
        $this->carsModel = $carsModel;
    }

    /**
     * @return mixed
     */
    private function getFuelAmount()
    {
        return $this->fuelAmount;
    }

    /**
     * @param mixed $fuelAmount
     */
    private function setFuelAmount($fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return mixed
     */
    private function getFuelCostPerKm()
    {
        return $this->fuelCostPerKm;
    }

    /**
     * @param mixed $fuelCostPerKm
     */
    private function setFuelCostPerKm($fuelCostPerKm): void
    {
        $this->fuelCostPerKm = $fuelCostPerKm;
    }

    /**
     * @return mixed
     */
    private function getDistanceTraveled()
    {
        return $this->distanceTraveled;
    }

    /**
     * @param mixed $distanceTraveled
     */
    private function setDistanceTraveled($distanceTraveled): void
    {
        $this->distanceTraveled = $distanceTraveled;
    }

    public function moveDistance($distance): void
    {
        $needFuel = round($distance * $this->fuelCostPerKm, 2);
        if (round($this->getFuelAmount(), 2) < $needFuel) {
            echo "Insufficient fuel for the drive" . PHP_EOL;
        } else {
            $this->setFuelAmount($this->getFuelAmount() - $needFuel);
            $this->setDistanceTraveled($this->getDistanceTraveled() + $distance);
            return;
        }
    }

    public function __toString(): string
    {
        $fuelAmount = number_format(abs($this->getFuelAmount()), 2, '.', '');
        return "{$this->getCarsModel()} $fuelAmount {$this->getDistanceTraveled()}";
    }
}

$n = intval(readline());
$arrayOfCars = [];
for ($i = 0; $i < $n; $i++) {
    list($model, $fuelAmount, $fuelCostPerKm) = explode(" ", readline());
    $car = new Car($model, $fuelAmount, $fuelCostPerKm);
    $arrayOfCars[] = $car;
}

$input = readline();
while ($input !== "End") {
    list($command, $carModel, $amountOfKm) = explode(" ", $input);
    /**
     * @var Car $car
     */
    foreach ($arrayOfCars as $car) {
        if ($carModel == $car->getCarsModel()) {
            $car->moveDistance($amountOfKm);
        }
    }
    $input = readline();
}
foreach ($arrayOfCars as $car) {
    echo $car . PHP_EOL;
}
