<?php
class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var float
     */
    private $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @param string $title
     * @throws Exception
     */
    private function setTitle(string $title): void
    {
        if (strlen($title) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    private function setAuthor(string $author): void
    {
        list($firstName, $secondName) = explode(" ", $author);
        if (is_numeric($secondName[0])) {
            throw new Exception("Author not valid!");
        }
        $this->author = $author;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    private function setPrice(float $price): void
    {
        if ($price <= 0) {
            throw new Exception("Price not valid!");
        }
        $this->price = $price;
    }

    /**
     * @return float
     */
    protected function getPrice(): float
    {
        return $this->price;
    }

    public function __toString(): string
    {
        return "OK\n{$this->getPrice()}";
    }
}

class GoldenEditionBook extends Book
{
    public function getPrice(): float
    {
        $newPrice = parent::getPrice() * 1.3;
        return $newPrice;
    }
}

$name = readline();
$title = readline();
$price = floatval(readline());
$typeOfBook = readline();

if ($typeOfBook === "STANDARD") {
    try {
        $book = new Book($title, $name, $price);
        echo $book;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else if ($typeOfBook === "GOLD") {
    try {
        $book = new GoldenEditionBook($title, $name, $price);
        echo $book;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo "Type is not valid!";
}
