<?php
$number = intval(readline());
$commands = explode(", ", readline());
for ($i = 0; $i < count($commands); $i++) {
    $number = selectOperation($commands[$i], $number);
    echo $number . PHP_EOL;
}

function selectOperation(string $command, float $number): float
{
    if ($command === "chop") {
        return $number = chopSecond($number);
    } else if ($command === "dice") {
        return $number = dice($number);
    } else if ($command === "spice") {
        return $number = spice($number);
    } else if ($command === "bake") {
        return $number = bake($number);
    } else if ($command === "fillet") {
        return $number = fillet($number);
    }
    return 0;
}

function dice(float $number): float {
    return sqrt($number);
}
function chopSecond(float $number): float {
    $result = $number / 2;
    return $result;
}
function spice(float $number): float {
    return ++$number;
}
function bake(float $number): float {
    return $number * 3;
}
function fillet(float $number): float {
    return $number - ($number * 0.20);
}
