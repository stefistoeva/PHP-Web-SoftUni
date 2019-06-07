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
    public function __construct($number)
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

    private function returnEnglishName(int $number): string
    {
        $lastDigit = $number % 10;
        switch ($lastDigit) {
            case 0: return "zero"; break;
            case 1: return "one"; break;
            case 2: return "two"; break;
            case 3: return "three"; break;
            case 4: return "four"; break;
            case 5: return "five"; break;
            case 6: return "six"; break;
            case 7: return "seven"; break;
            case 8: return "eight"; break;
            case 9: return "nine"; break;
        }
        return "";
    }

    public function __toString(): string
    {
        $result = $this->returnEnglishName($this->getNumber());
        return $result;
    }
}

$input = intval(readline());
$number = new Number($input);
echo $number;
