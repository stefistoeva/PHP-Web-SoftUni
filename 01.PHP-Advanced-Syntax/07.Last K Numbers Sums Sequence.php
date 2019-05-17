<?php
$n = intval(readline());
$k = intval(readline());

$numbers = array_fill(0, $n, 0);
$numbers[0] = 1;

for ($currentEl = 0; $currentEl < count($numbers); $currentEl++) {
    $startIndex = max(0, $currentEl - $k);

    $sum = 0;
    for ($i = $startIndex; $i <= $currentEl; $i++) {
        $sum += $numbers[$i];
    }

    $numbers[$currentEl] = $sum;
}
echo implode(" ", $numbers);