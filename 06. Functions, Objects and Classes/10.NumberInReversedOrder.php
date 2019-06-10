<?php
class DecimalNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    private function setNumber($number): void
    {
        $this->number = $number;
    }

    public function reversedOrder(): void
    {
        echo strrev($this->getNumber());
    }
}

$number = readline();
$reversedNumber = new DecimalNumber($number);
$reversedNumber->reversedOrder();
