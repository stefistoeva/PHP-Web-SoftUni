<?php
class Number
{
    /**
     * @var int
     */
    private $number;

    /**
     * Number constructor.
     * @param $number
     */
    public function __construct(int $number)
    {
        $this->setNumber($number);
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    private function returnEnglishName(): string
    {
        $lastDigit = $this->number % 10;
        switch ($lastDigit) {
            case 0: return "zero";
            case 1: return "one";
            case 2: return "two";
            case 3: return "three";
            case 4: return "four";
            case 5: return "five";
            case 6: return "six";
            case 7: return "seven";
            case 8: return "eight";
            case 9: return "nine";
        }
        return "";
    }

    public function __toString(): string
    {
        $result = $this->returnEnglishName();
        return $result;
    }
}

$input = intval(readline());
$number = new Number($input);
echo $number;
