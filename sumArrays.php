<?php
list($size, $pattern) = explode(", ", readline());
$matrix = [];
$count = 1;
if ($pattern === "A") {
    for ($row = 0; $row < $size; $row++) {
        for ($col = 0; $col < $size; $col++) {
            $matrix[$col][$row] = $count++;
        }
    }
    printMatrix($matrix);
} else if ($pattern === "B") {
    for ($row = 0; $row < $size; $row++) {
        for ($col = 0; $col < $size; $col++) {
            if ($row % 2 === 0) {
                $matrix[$col][$row] = $count++;
            } else {
                $matrix[$size - 1 - $col][$row] = $count++;
            }
        }
    }
    printMatrix($matrix);
}
//else {
//    for ($row = 0; $row < $size; $row++) {
//        for ($col = 0; $col < $size; $col++) {
//            $matrix[$row][$col] = $count++;
//        }
//    }
//    printMatrix($matrix);
//}

function printMatrix($matrix) {
    for ($row = 0; $row < count($matrix); $row++) {
        for ($col = 0; $col < count($matrix[$row]); $col++) {
            echo $matrix[$row][$col] . " ";
        }
        echo PHP_EOL;
    }
}