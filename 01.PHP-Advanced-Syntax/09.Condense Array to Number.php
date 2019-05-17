<?php
$numbers = array_map("intval", explode(" ", readline()));

$condensed = [];
while (count($numbers) > 1) {
    $condensed = array_fill(0, count($numbers) - 1, 0);
    for ($i = 0; $i < count($numbers) - 1; $i++) {
        $condensed[$i] = $numbers[$i] + $numbers[$i + 1];
    }
    $numbers = [];
    for ($i = 0; $i < count($condensed); $i++) {
        $numbers[] = $condensed[$i];
    }
}
echo implode(" ", $numbers);