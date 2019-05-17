<?php
$teamInfo = [];
$teamScore = [];
$prohibitedSymbols = ["@", "%", "&", "$", "*"];
while (true) {
    $input = trim(readline());
    if ($input === "Result") {
        break;
    }
    $cleanText = str_replace($prohibitedSymbols, "", $input);
    $cleanText = explode("|", $cleanText);
    if ($cleanText[0] === strtoupper($cleanText[0])) {
        $team = $cleanText[0];
        $player = $cleanText[1];
    } else {
        $team = $cleanText[1];
        $player = $cleanText[0];
    }
    $points = intval($cleanText[2]);
    $teamInfo[$team][$player] = $points;
    arsort($teamInfo[$team]);
}

foreach ($teamInfo as $key => $value) {
    if (!array_key_exists($key, $teamScore)) {
        $teamScore[$key] = 0;
    }

    foreach ($value as $k => $v) {
        $teamScore[$key] += $v;
    }
}

arsort($teamScore);
foreach ($teamScore as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
    echo "Most points scored by " . key($teamInfo[$key]) . PHP_EOL;
}