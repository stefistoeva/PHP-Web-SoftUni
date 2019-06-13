<?php
class Song
{
    /**
     * @var string
     */
    private $artistName;

    /**
     * @var string
     */
    private $songName;

    /**
     * @var array
     */
    private $time;

    /**
     * Song constructor.
     * @param string $artistName
     * @param string $songName
     * @param array $time
     * @throws Exception
     */
    public function __construct(string $artistName, string $songName, array $time)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setTime($time);
    }

    /**
     * @param string $artistName
     * @throws Exception
     */
    private function setArtistName(string $artistName): void
    {
        if (strlen($artistName) < 3 || strlen($artistName) > 20) {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    /**
     * @param string $songName
     * @throws Exception
     */
    private function setSongName(string $songName): void
    {
        if (strlen($songName) < 3 || strlen($songName) > 30) {
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    /**
     * @return array
     */
    public function getTime(): array
    {
        return $this->time;
    }

    /**
     * @param array $time
     * @throws Exception
     */
    private function setTime(array $time): void
    {
        $min = $time[0];
        $sec = $time[1];
        if ($min < 0 || $min > 14) {
            throw new Exception("Song minutes should be between 0 and 14.");
        }
        if ($sec < 0 || $sec > 59) {
            throw new Exception("Song seconds should be between 0 and 59.");
        }
        $this->time = ["minutes" => $min, "seconds" => $sec];
    }

    public function __toString(): string
    {
        return "Song added.";
    }

}


$arrayOfSongs = [];
$lineOfSongs = intval(readline());
for ($i = 0; $i < $lineOfSongs; $i++) {
    $informationForSong = explode(";", trim(readline()));
    list($artistName, $songName, $time) = $informationForSong;
    $infoForTime = explode(":", $time);
    list($minutes, $seconds) = explode(":", $time);
    try {
        $song = new Song($artistName, $songName, [intval($minutes), intval($seconds)]);
        $arrayOfSongs[] = $song;
        echo $song . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
$count = count($arrayOfSongs);
echo "Songs added: {$count}" . PHP_EOL;
echo "Playlist length: ";

$secs = 0;
/**
 * @var Song $song
 */
foreach ($arrayOfSongs as $song) {
    foreach ($song->getTime() as $key => $item) {
        if ($key === "minutes") {
            $secs += intval($item * 60);
        } else if ($key === "seconds") {
            $secs += intval($item);
        }
    }
}
$hours = intval($secs / 3600);
$min = intval($secs / 60);
if ($min % 60 == 0) {
    $min = 0;
}
$secs = $secs - ($hours * 3600 + $min * 60);
$min = str_pad($min, 2, "0", STR_PAD_LEFT);
$secs = str_pad($secs, 2, "0", STR_PAD_LEFT);
echo "{$hours}h {$min}m {$secs}s";
