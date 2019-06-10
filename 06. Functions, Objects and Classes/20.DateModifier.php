<?php
class DateModifier
{
    public function calculateDayDiff(string $dateFrom, string $dateTo): int
    {
        $minDate = $dateFrom;
        $maxDate = $dateTo;

        $dateFromParts = array_map('intval', explode(" ", $dateFrom));
        $dateToParts = array_map('intval', explode(" ", $dateTo));
        if ($dateFromParts[0] > $dateToParts[0]) {
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        } else if ($dateFromParts[0] == $dateToParts[0] && $dateFromParts[1] > $dateToParts[1]) {
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        } else if ($dateFromParts[0] == $dateToParts[0] && $dateFromParts[1] == $dateToParts[1] && $dateFromParts[2] == $dateToParts[2] ) {
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        }

        $days = 0;
        $dateFromParts = array_map('intval', explode(" ", $minDate));
        $dateToParts = array_map('intval', explode(" ", $maxDate));

        $days += ($dateToParts[0] - $dateFromParts[0]) * 365;
        for ($year = $dateFromParts[0]; $year <= $dateToParts[0]; $year++) {
            if ($this->isLeapYear($year)) {
                $days++;
            }
        }

        if ($this->isLeapYear($dateFromParts[0]) && $dateToParts[0] == $dateFromParts[0] && $dateFromParts[1] >= 3) {
            $days--;
        }

        if ($this->isLeapYear($dateToParts[0]) && $dateToParts[1] < 3) {
            $days--;
        }

        $days +=
            $this->getDaysFromBeginning($dateToParts[0], $dateToParts[1], $dateToParts[2])
            -
            $this->getDaysFromBeginning($dateFromParts[0], $dateFromParts[1], $dateFromParts[2]);
        return $days;
    }

    private function isLeapYear(int $year) : bool
    {
        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function getDaysFromBeginning(int $year, int $month, int $days): int
    {
        if ($month == 1) return $days;
        if ($month == 2) return 31 + $days;

        $fullMonths = $month / 2 + 1;
        if ($month <= 7) {
            $fullMonths = ceil($month / 2);
        }

        $halfMonths = $month - $fullMonths - 1;

        $dayPassed = $fullMonths * 31 + $halfMonths * 30;
        $dayPassed--;
        if (!$this->isLeapYear($year)) {
            $dayPassed--;
        }

        $dayPassed += $days;

        return $dayPassed;
    }
}

$diff = new DateModifier();
echo $diff->calculateDayDiff(readline(), readline());
