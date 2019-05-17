<?php
$phoneBook = [];
while (true) {
    $input = explode(" ", readline());
    $command = $input[0];
    if ($command === "END") {
        break;
    } else if ($command === "A") {
        $name = $input[1];
        $phone = $input[2];
        $phoneBook[$name] = $phone;
    } else if ($command === "S") {
        $name = $input[1];
        if (key_exists($name, $phoneBook)) {
            echo $name . " -> " . $phoneBook[$name] . PHP_EOL;
        } else {
            echo "Contact $name does not exist." . PHP_EOL;
        }
    }
}