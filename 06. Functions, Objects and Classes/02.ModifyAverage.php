<?php
$number = readline();
while (true) {
    if (averageValue($number) > 5) {
        break;
    }
    $number .= 9;
}
echo $number;

function averageValue(string $number) {
    $count = strlen($number);
    $sum = 0;
    for ($i = 0; $i < $count; $i++) {
        $sum += $number[$i];
    }
    $average = $sum / $count;
    return $average;
}
