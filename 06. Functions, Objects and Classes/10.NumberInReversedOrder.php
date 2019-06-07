<?php
class DecimalNumber
{
    private $number;

    public function __construct($number)
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

    public function reversedOrder($number)
    {
        echo strrev($number);
    }
}

$number = readline();
$reversedNumber = new DecimalNumber($number);
$reversedNumber->reversedOrder($reversedNumber->getNumber());
