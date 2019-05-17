<?php
$input = readline();
$users = [];
$unsuccessfulLogin = 0;
while (true) {
    if ($input === "login") {
        while (true) {
            $input = readline();
            if ($input === "end") {
                echo "unsuccessful login attempts: $unsuccessfulLogin";
                die;
            }
            list($userName, $password) = explode(" -> ", $input);
            if (key_exists($userName, $users) && in_array($password, $users)) {
                echo "$userName: logged in successfully" . PHP_EOL;
            } else {
                echo "$userName: login failed" . PHP_EOL;
                $unsuccessfulLogin++;
            }
        }
    } else {
        list($userName, $password) = explode(" -> ", $input);
        $users[$userName] = $password;
    }
    $input = readline();
}