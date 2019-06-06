<?php
list($x1, $y1, $x2, $y2) = array_map("intval", explode(", ", readline()));

printResult($x1, $y1, 0, 0);
printResult($x2, $y2, 0, 0);
printResult($x1, $y1, $x2, $y2);

function isValid(int $x1, int $y1, int $x2, int $y2): bool {
    $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    if ($distance == intval($distance)) {
        return true;
    }
    return false;
}

function printResult($x1, $y1, $x2, $y2): void {
    if (isValid($x1, $y1, $x2, $y2)) {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid" . PHP_EOL;
    } else {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid" . PHP_EOL;
    }
}
