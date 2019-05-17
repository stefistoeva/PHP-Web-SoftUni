<?php
$numbers = array_map("intval", explode(" ", readline()));

$maxCount = 0;
$startIndex = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $currentCount = 0;
    for ($j = $i; $j < count($numbers) - 1; $j++) {
        if ($numbers[$j] < $numbers[$j + 1]) {
            $currentCount++;
            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $startIndex = $i;
            }
        } else {
            break;
        }
    }
}
for ($i = 0; $i <= $maxCount; $i++) {
    echo $numbers[$startIndex + $i] . " ";
}