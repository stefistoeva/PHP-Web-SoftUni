<?php
class Human
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }


    /**
     * @return string
     */
    protected function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    protected function setFirstName(string $firstName): void
    {
        if (!preg_match("/^[A-Z]{1}[a-z]+/", $firstName)) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    protected function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if (!preg_match("/^[A-Z]{1}[a-z]+/", $lastName)) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }


}

class Student extends Human
{
    /**
     * @var string
     */
    private $facNum;

    public function __construct(string $firstName, string $lastName, string $facNum)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacNum($facNum);
    }

    /**
     * @return string
     */
    private function getFacNum(): string
    {
        return $this->facNum;
    }

    /**
     * @param string $facNum
     * @throws Exception
     */
    private function setFacNum(string $facNum): void
    {
        if (!preg_match("/^[\d]{5,10}$/", $facNum)) {
            throw new Exception("Invalid faculty number!");
        }
        $this->facNum = $facNum;
    }

    public function __toString(): string
    {
        return "First Name: {$this->getFirstName()}" . PHP_EOL
            . "Last Name: {$this->getLastName()}" . PHP_EOL
            . "Faculty number: {$this->getFacNum()}" . PHP_EOL;
    }
}

class Worker extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * @var float
     */
    private $workHoursPerDay;

    public function __construct(string $firstName, string $lastName, float $salary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($salary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }


    /**
     * @return float
     */
    private function getWeekSalary(): float
    {
        return $this->weekSalary;
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary < 10.0) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    /**
     * @return float
     */
    private function getWorkHoursPerDay(): float
    {
        return $this->workHoursPerDay;
    }

    /**
     * @param float $workHoursPerDay
     * @throws Exception
     */
    private function setWorkHoursPerDay(float $workHoursPerDay): void
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    private function earnMoneyByHour(int $weekSalary, int $workHoursPerDay): float
    {
        $earnByHour = floatval($weekSalary / ($workHoursPerDay * 7));
        return $earnByHour;
    }

    public function __toString(): string
    {
        $salary = number_format($this->getWeekSalary(), 2, '.', '');
        $perHour = number_format($this->getWorkHoursPerDay(), 2, '.', '');
        $earnMoney = number_format($this->earnMoneyByHour($this->getWeekSalary(), $this->getWorkHoursPerDay()), 2, '.', '');
        return "First Name: {$this->getFirstName()}" . PHP_EOL
            . "Last Name: {$this->getLastName()}" . PHP_EOL
            . "Week Salary: {$salary}" . PHP_EOL
            . "Hours per day: {$perHour}" . PHP_EOL
            . "Salary per hour: {$earnMoney}" . PHP_EOL;
    }
}

$studentInfo = preg_split("/[ ]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
list($studentFirstName, $studentLastName, $facNum) = $studentInfo;

$workerInfo = preg_split("/[ ]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
list($workerFirstName, $workerLastName, $salary, $workingHours) = $workerInfo;

try {
    $student = new Student($studentFirstName, $studentLastName, $facNum);
    $worker = new Worker($workerFirstName, $workerLastName, $salary, $workingHours);
    echo $student;
    echo PHP_EOL;
    echo $worker;
} catch (Exception $e) {
    echo $e->getMessage();
    return;
}
