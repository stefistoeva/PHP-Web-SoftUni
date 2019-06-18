<?php
interface HashedPass
{
    public function hashingPass();
}

abstract class Characters
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $hashedPassword;

    /** @var int */
    protected $level;

    /** @var float|int */
    protected $specialPoints;

    /**
     * @var string
     */
    private $hashedPass = '';

    /**
     * Characters constructor.
     * @param string $username
     * @param int $level
     * @param float $specialPoints
     */
    public function __construct(string $username, int $level, float $specialPoints)
    {
        $this->setUsername($username);
        $this->setLevel($level);
        $this->setSpecialPoints($specialPoints);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    protected function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    protected function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return float
     */
    public function getSpecialPoints(): float
    {
        return $this->specialPoints;
    }

    /**
     * @param float $specialPoints
     */
    protected function setSpecialPoints(float $specialPoints): void
    {
        $this->specialPoints = $specialPoints;
    }
}

class Demon extends Characters implements HashedPass
{
    public function hashingPass()
    {
        return strlen($this->getUsername()) * 217;
    }

    public function __toString()
    {
        $energy = number_format(($this->getSpecialPoints() * $this->getLevel()), 1, ".", '');
        return "\"{$this->getUsername()}\" | \"{$this->hashingPass()}\" -> Demon" . PHP_EOL . $energy;
    }
}

class Archangel extends Characters implements HashedPass
{
    public function hashingPass()
    {
        return $this->hashedPassword = strrev($this->getUsername()) . strlen($this->getUsername()) * 21;
    }

    public function __toString()
    {
        $mana = intval($this->getSpecialPoints() * $this->getLevel());
        return "\"{$this->getUsername()}\" | \"{$this->hashingPass()}\" -> Archangel" . PHP_EOL . $mana;
    }
}

$tokens = explode(" | ", readline());
$username = $tokens[0];
$type = $tokens[1];
$specialPoints = $tokens[2];
$level = $tokens[3];
if ($type === "Demon") {
    $energy = floatval($specialPoints);
    $player = new Demon($username, $level, $energy);
} else if ($type === "Archangel") {
    $mana = intval($specialPoints);
    $player = new Archangel($username, $level,  $mana);
}
echo $player;
