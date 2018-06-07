<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 06.06.2018
 * Time: 15:21
 */

namespace VSalin\Point;


class Point
{
    private $x;
    private $y;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function fromArray($arr)
    {
        return new Point($arr[0], $arr[1]);
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function toString()
    {
        return $this->x . ' ' . $this->y;
    }
}