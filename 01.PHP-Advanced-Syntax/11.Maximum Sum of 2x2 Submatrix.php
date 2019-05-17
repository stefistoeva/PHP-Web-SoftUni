<?php
list($rows, $columns) = array_map('intval', explode(", ", readline()));

$matrix = [];
for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map("intval", explode(", ", readline()));
}

$startCol = 0;
$startRow = 0;
$bestSum = 0;
for ($row = 0; $row < $rows - 1; $row++) {
    for ($column = 0; $column < count($matrix[$row]) - 1; $column++) {
        $currentSum = $matrix[$row][$column] + $matrix[$row][$column+1] +
            $matrix[$row+1][$column] + $matrix[$row+1][$column+1];
        if ($currentSum > $bestSum) {
            $bestSum = $currentSum;
            $startCol = $column;
            $startRow = $row;
        }
    }
}

for($row = $startRow; $row <= $startRow + 1; $row++) {
    for ($column = $startCol; $column <= $startCol + 1; $column++) {
        if ($row !== $startRow + 1 || $column !== $startCol + 1) {
            echo $matrix[$row][$column] . " ";
        } else {
            echo $matrix[$row][$column];
        }

    }
    echo PHP_EOL;
}
echo $bestSum;