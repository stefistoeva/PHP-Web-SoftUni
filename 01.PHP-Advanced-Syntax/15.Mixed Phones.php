<?php
$input = readline();
$array = [];
while ($input !== "Over") {
    list($firstElement, $secondElement) = explode(" : ", $input);
    if (is_numeric($firstElement)) {
        $phone = $firstElement;
        $name = $secondElement;
    } else {
        $phone = $secondElement;
        $name = $firstElement;
    }
    $array[$name] = $phone;
    $input = readline();
}
ksort($array);
foreach ($array as $name => $phone) {
    echo "$name -> $phone" . PHP_EOL;
}