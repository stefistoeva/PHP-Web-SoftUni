<?php
class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name, float $salary, string $position, string $department, $email, $age)
    {
        $this->setName($name);
        $this->setSalary($salary);
        $this->setPosition($position);
        $this->setDepartment($department);
        $this->setEmail($email);
        $this->setAge($age);
    }

    /**
     * @return string
     */
    private function getName(): string
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
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    private function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    private function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    private function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    private function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    private function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    private function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    private function getAge()
    {
        return $this->age;
    }

    /**
     * @param $age
     */
    private function setAge($age): void
    {
        $this->age = $age;
    }

    public function __toString(): string
    {
        $salary = number_format($this->getSalary(), 2);
        if ($this->getEmail() === null && $this->getAge() === null) {
            $result = "{$this->getName()} {$salary} n/a -1";
        } else if ($this->getEmail() !== null && $this->getAge() === null) {
            $result = "{$this->getName()} {$salary} {$this->getEmail()} -1";
        } else if ($this->getEmail() === null && $this->getAge() !== null) {
            $result = "{$this->getName()} {$salary} n/a {$this->getAge()}";
        } else {
            $result = "{$this->getName()} {$salary} {$this->getEmail()} {$this->getAge()}";
        }
        return $result;
    }
}

$lines = intval(readline());
$employees = [];
$departments = [];
for ($i = 0; $i < $lines; $i++) {
    $newPerson = explode(" ", readline());
    list($name, $salary, $position, $department) = $newPerson;
    $email = null;
    $age = null;
    if (isset($newPerson[4]) && isset($newPerson[5])) {
        if (strpos($newPerson[4], '@')) {
            $email = $newPerson[4];
            $age = $newPerson[5];
        } else {
            $email = $newPerson[5];
            $age = $newPerson[4];
        }
    } else if (isset($newPerson[4]) && !isset($newPerson[5])) {
        if (strpos($newPerson[4], '@')) {
            $email = $newPerson[4];
        } else {
            $age = $newPerson[4];
        }
    }
    $employees[] = new Employee($name, $salary, $position, $department, $email, $age);
    if (isset($department, $departments)) {
        $departments[$department][] = $salary;
    } else {
        $departments[$department] = $salary;
    }
}

$highestSalary = 0;
$highestDepartment = '';
foreach ($departments as $department => $value) {
    if ($highestSalary < (array_sum($value) / count($value))) {
        $highestSalary = array_sum($value) / count($value);
        $highestDepartment = $department;
    }
}
echo "Highest Average Salary: " . $highestDepartment . PHP_EOL;
usort($employees, function (Employee $salary1, Employee $salary2) {
   return $salary2->getSalary() <=> $salary1->getSalary();
});

/**
 * @var Employee $employee
 */
foreach ($employees as $employee) {
    if ($employee->getDepartment() == $highestDepartment) {
        echo $employee . PHP_EOL;
    }
}
