<?php
interface Browse
{
    public function browse(string $address): string ;
}

interface CallInterface
{
    public function call(string $number): string ;
}

class SmartPhone implements Browse, CallInterface
{
    /** @param string
     * @return string
     * @throws Exception
     */
    public function call(string $phone): string
    {
        if (!is_numeric($phone)) {
            throw new Exception("Invalid number!");
        }
        return "Calling... " . $phone . PHP_EOL;
    }

    /**
     * @param string
     * @return string
     * @throws Exception
     */
    public function browse(string $address): string
    {
        if (preg_match("/[0-9]+/", $address)) {
            throw new Exception("Invalid URL!");
        }
        return "Browsing: " . $address . "!" . PHP_EOL;
    }
}

$numbers = readline();
$numbers = explode(" ", $numbers);

$addresses = readline();
$addresses = explode(" ", $addresses);

$smartPhone = new SmartPhone();
foreach ($numbers as $number) {
    try {
        echo $smartPhone->call($number);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
foreach ($addresses as $address) {
    try {
        echo $smartPhone->browse($address);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
