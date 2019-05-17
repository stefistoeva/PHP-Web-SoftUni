<?php
$input = explode(" ", readline());
$sum = 0;
for ($i = 0; $i < count($input); $i++) {
    $current = strrev($input[$i]);
    $sum += intval($current);
}
echo $sum;