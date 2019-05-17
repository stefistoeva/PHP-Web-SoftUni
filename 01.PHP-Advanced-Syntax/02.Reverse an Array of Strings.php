<?php
$input = explode(" ", readline());

for ($i = 0; $i < count($input); $i++) {
    echo $input[count($input) - $i - 1] . " ";
}