<?php
$input = array_map("intval", explode(" ", readline()));
$values = [];

for ($i = 0; $i < count($input); $i++) {
    $current = $input[$i];
    if (!array_key_exists($current, $values)) {
        $values[$current] = 1;
    } else {
        $values[$current] += 1;
    }
}
$bestNum = PHP_INT_MIN;
$maxCount = PHP_INT_MIN;
foreach ($values as $key => $value) {
    if ($value > $maxCount) {
        $maxCount = $value;
        $bestNum = $key;
    }
}
echo $bestNum;