<?php
list($rows, $columns) = array_map('intval', explode(", ", readline()));
$matrix = [];

for ($row = 0; $row < $rows; $row++) {
    $line = array_map("intval", explode(", ", readline()));
    for ($column = 0; $column < $columns; $column++) {
        $matrix[$row][$column] = $line[$column];
    }
}

$sum = 0;
foreach ($matrix as $rowsLine) {
    foreach ($rowsLine as $value) {
        $sum += $value;
    }
}
echo $rows . PHP_EOL;
echo $columns . PHP_EOL;
echo $sum . PHP_EOL;