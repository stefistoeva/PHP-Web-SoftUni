<?php
$input = array_map("floatval", explode(", ", readline()));
for ($i = 0; $i < count($input) - 1; $i += 2) {
    $x = $input[$i];
    $y = $input[$i + 1];
    echo locator($x, $y) . PHP_EOL;
}

function locator(float $x, float $y): string {
    if (($x <= 3 && $x >= 1) && ($y <= 3 && $y >= 1)) {
        return "Tuvalu";
    }
    if (($x <= 9 && $x >= 8) && ($y <= 1 && $y >= 0)) {
        return "Tokelau";
    }
    if (($x <= 7 && $x >= 5) && ($y <= 6 && $y >= 3)) {
        return "Samoa";
    }
    if (($x <= 2 && $x >= 0) && ($y <= 8 && $y >= 6)) {
        return "Tonga";
    }
    if (($x <= 9 && $x >= 4) && ($y <= 8 && $y >= 7)) {
        return "Cook";
    }
    return "On the bottom of the ocean";
}
