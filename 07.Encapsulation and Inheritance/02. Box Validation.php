<?php
class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @throws Exception
     */
    private function setLength(float $length): void
    {
        $this->validateInput($length, "Length");
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    private function setWidth(float $width): void
    {
        $this->validateInput($width, "Width");
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    private function setHeight(float $height): void
    {
        $this->validateInput($height, "Height");
        $this->height = $height;
    }

    /**
     * @param float $value
     * @param string $parameter
     * @throws Exception
     */
    private function validateInput(float $value, string $parameter): void
    {
        if ($value <= 0) {
            throw new Exception("{$parameter} cannot be zero or negative.");
        }
    }

    /**
     * @return float
     */
    private function getVolume(): float
    {
        $result = $this->getLength() * $this->getWidth() * $this->getHeight();
        return $result;
    }

    /**
     * @return float
     */
    private function getLateralSurfaceArea(): float
    {
        $result = (2 * $this->getLength() * $this->getHeight())
            + (2 * $this->getWidth() * $this->getHeight());
        return $result;
    }

    /**
     * @return float
     */
    private function getSurfaceArea(): float
    {
        $result = 2 * $this->getLength() * $this->getWidth()
            + (2 * $this->getLength() * $this->getHeight())
            + (2 * $this->getWidth() * $this->getHeight());
        return $result;
    }

    public function __toString(): string
    {
        $formattedSurfaceArea = number_format($this->getSurfaceArea(), 2, ".", "");
        $formattedLateralArea = number_format($this->getLateralSurfaceArea(), 2, ".", "");
        $formattedVolume = number_format($this->getVolume(), 2, ".", "");
        return "Surface Area - {$formattedSurfaceArea}\nLateral Surface Area - {$formattedLateralArea}\nVolume - {$formattedVolume}";
    }
}

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());
try {
    $box = new Box($length, $width, $height);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}
