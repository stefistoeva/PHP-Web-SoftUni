<?php
class FoodFactory
{
    /**
     * @var string
     */
    private $food;

    /**
     * @var int
     */
    private $points;

    public function __construct(string $food)
    {
        $this->setFood($food);
        $this->pointsCheck();
    }

    /**
     * @param int $points
     */
    private function setPoints(int $points): void
    {
        $this->points = $points;
    }

    /**
     * @param mixed $food
     */
    private function setFood($food): void
    {
        $food = strtolower($food);
        $this->food = $food;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    private function pointsCheck()
    {
        $food = $this->food;
        if ($food === "cram") {
            $this->setPoints(2);
        } else if ($food === "lembas") {
            $this->setPoints(3);
        } else if ($food === "apple" || $food === "melon") {
            $this->setPoints(1);
        } else if ($food === "honeycake") {
            $this->setPoints(5);
        } else if ($food === "mushrooms") {
            $this->setPoints(-10);
        } else {
            $this->setPoints(-1);
        }
    }
}

class MoodFactory
{
    private $points;

    public function __construct(int $points)
    {
        $this->setPoints($points);
    }

    /**
     * @param mixed $points
     */
    private function setPoints($points): void
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    private function getPoints()
    {
        return $this->points;
    }

    public function moods(): string
    {
        $points = $this->getPoints();
        if ($points < -5) {
            return "Angry";
        }
        if ($points >= -5 && $points < 0) {
            return "Sad";
        }
        if ($points >= 0 && $points < 15) {
            return "Happy";
        }
        return "PHP";
    }
}

$food = explode(",", readline());
$points = 0;
for ($i = 0; $i < count($food); $i++) {
    $current = $food[$i];
    $foodFactory = new FoodFactory($current);
    $points += $foodFactory->getPoints();
}
echo $points . PHP_EOL;
$mood = new MoodFactory($points);
echo $mood->moods();
