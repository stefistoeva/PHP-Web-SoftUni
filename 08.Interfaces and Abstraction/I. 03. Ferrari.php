<?php
interface CarInterface
{
    public static function create(string $model);
    public function brakes();
    public function gasPedal();
}

class Ferrari implements CarInterface
{
    const BRAKES = "Brakes!";
    const GAS_PEDAL = "Zadu6avam sA!";
    public function brakes(): string
    {
        return self::BRAKES;
    }

    public function gasPedal(): string
    {
        return self::GAS_PEDAL;
    }

    /**
     * @param string $model
     * @return mixed
     * @throws Exception
     */
    public static function create(string $model)
    {
        if (!class_exists($model)) {
            throw new Exception("");
        }
        return new $model($model);
    }
}

class Spider extends Ferrari
{
    const MODEL = "488-Spider";

    /**
     * @var string
     */
    private $driversName;

    public function __construct(string $driversName)
    {
        $this->setDriversName($driversName);
    }

    /**
     * @return string
     */
    private function getDriversName(): string
    {
        return $this->driversName;
    }

    /**
     * @param string $driversName
     */
    private function setDriversName(string $driversName): void
    {
        $this->driversName = $driversName;
    }

    public function __toString(): string
    {
        return self::MODEL . "/" . parent::brakes() . "/" . parent::GAS_PEDAL . "/" . $this->getDriversName();
    }
}

$driversName = readline();
$model = new Spider($driversName);
echo $model;
