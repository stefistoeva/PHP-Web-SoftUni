<?php
$stocks = [];
$input = readline();
while ($input !== "shopping time") {
    $tokens = explode(" ", $input);
    $product = $tokens[1];
    $quantity = $tokens[2];
    if (!key_exists($product, $stocks)) {
        $stocks[$product] = 0;
    }
    $stocks[$product] += $quantity;
    $input = readline();
}

$input = readline();
while ($input !== "exam time") {
    $tokens = explode(" ", $input);
    $product = $tokens[1];
    $quantity = $tokens[2];
    if (!key_exists($product, $stocks)) {
        echo "$product doesn't exist" . PHP_EOL;
    } else {
        if ($stocks[$product] <= 0) {
            echo "$product out of stock" . PHP_EOL;
        } else {
            if ($quantity > $stocks[$product]) {
                $stocks[$product] = 0;
            } else {
                $stocks[$product] -= $quantity;
            }
        }
    }
    $input = readline();
}

foreach ($stocks as $product => $quantity) {
    if ($quantity > 0) {
        echo "$product -> $quantity" . PHP_EOL;
    }
}