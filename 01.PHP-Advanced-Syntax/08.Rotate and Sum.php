<?php
$n = array_map("intval", explode(" ", readline()));
$rotations = intval(readline());

$array = [];
$sum = [];

for ($i = 0; $i < $rotations; $i++) {
    array_unshift($n, $n[count($n) - 1]);
    array_pop($n);
    $array[] = $n;
}

for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($n); $j++) {
        $sum[$j] += $array[$i][$j];
    }
}

echo implode(" ", $sum);
