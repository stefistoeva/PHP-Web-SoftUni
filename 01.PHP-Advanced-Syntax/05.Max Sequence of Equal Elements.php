<?php
$input = array_map("intval", explode(" ", readline()));

$bestStart = $input[0];
$bestLen = 1;

$beforePos = $input[0];
$start = 0;
$len = 1;
for ($i = 1; $i < count($input); $i++) {
    if ($beforePos === $input[$i]) {
        $len++;
        $start = $input[$i];
    } else {
        $start = $i;
        $len = 1;
    }

    if ($len > $bestLen) {
        $bestLen = $len;
        $bestStart = $start;
    }
    $beforePos = $input[$i];
}
for ($i = 0; $i < $bestLen; $i++) {
    echo $bestStart . " ";
}