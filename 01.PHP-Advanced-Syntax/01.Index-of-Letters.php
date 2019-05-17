<?php
$input = strtolower(readline());
$alphabet = "abcdefghijklmnopqrstuvwxyz";
for ($i = 0; $i < strlen($input); $i++) {
    $current = $input[$i];
    echo $current . " -> " . strpos($alphabet, $current) . PHP_EOL;
}
