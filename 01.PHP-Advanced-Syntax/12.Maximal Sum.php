<?php
list($rows, $columns) = array_map('intval', explode(" ", readline()));

$matrix = [];
for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map('intval', explode(" ", readline()));
}

$startCol = 0;
$startRow = 0;
$bestSum = 0;
for ($row = 0; $row < $rows - 2; $row++) {
    for ($column = 0; $column < count($matrix[$row]) - 2; $column++) {
        $currentSum = $matrix[$row][$column] + $matrix[$row][$column + 1] +
            $matrix[$row][$column + 2] + $matrix[$row + 1][$column] +
            $matrix[$row + 1][$column + 1] + $matrix[$row + 1][$column + 2] +
            $matrix[$row + 2][$column] + $matrix[$row + 2][$column + 1] +
            $matrix[$row + 2][$column + 2];
        if ($currentSum > $bestSum) {
            $bestSum = $currentSum;
            $startCol = $column;
            $startRow = $row;
        }
    }
}

echo "Sum = " . $bestSum . PHP_EOL;

for($row = $startRow; $row <= $startRow + 2; $row++) {
    for ($column = $startCol; $column <= $startCol + 2; $column++) {
        echo $matrix[$row][$column] . " ";
    }
    echo PHP_EOL;
}