<?php

namespace color;

use InvalidArgumentException;

class Color
{
    private $red;
    private $blue;
    private $green;

    const MIN = 0;
    const MAX = 255;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function validate($color)
    {
        return $color >= self::MIN && $color <= self::MAX;
    }

    public function equals(Color $obj)
    {
       return $this->getRed() === $obj->getRed()
           && $this->getGreen() === $obj->getGreen()
           && $this->getBlue() === $obj->getBlue();
    }

    public static function random()
    {
        return new self(rand(self::MIN, self::MAX), rand(self::MIN, self::MAX), rand(self::MIN, self::MAX));
    }

    public function mix(Color $color)
    {
        $red = intval(($this->getRed() + $color->getRed()) / 2);
        $green = intval(($this->getGreen() + $color->getGreen()) / 2);
        $blue = intval(($this->getBlue() + $color->getBlue()) / 2);

        return new self($red, $green, $blue);
    }

    public function getRed()
    {
        return $this->red;
    }

    private function setRed($red)
    {
        if (!$this->validate($red)) {
            throw new InvalidArgumentException('uyuy');
        }
        $this->red = intval($red);
    }

    public function getBlue()
    {
        return $this->blue;
    }

    private function setBlue($blue)
    {
        if (!$this->validate($blue)) {
            throw new InvalidArgumentException('uyuy');
        }
        $this->blue = intval($blue);
    }

    public function getGreen()
    {
        return $this->green;
    }


    public function setGreen($green)
    {
        if (!$this->validate($green)) {
            throw new InvalidArgumentException('uyuy');
        }
        $this->green = intval($green);
    }


}