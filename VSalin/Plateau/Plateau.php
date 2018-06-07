<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 06.06.2018
 * Time: 17:13
 */

namespace VSalin\Plateau;
use VSalin\Point\Point;

class Plateau
{
    private $leftBottomPoint;
    private $rightTopPoint;

    public function __construct(Point $rightTopPoint, Point $leftBottomPoint = null)
    {
        $defaultLeftBottomPoint = new Point(0,0);
        $this->rightTopPoint = $rightTopPoint;
        $this->leftBottomPoint = $leftBottomPoint ?? $defaultLeftBottomPoint;
    }

    public function getNLimit(){
        return $this->rightTopPoint->getY();
    }
    public function getSLimit(){
        return $this->leftBottomPoint->getY();
    }
    public function getWLimit(){
        return $this->leftBottomPoint->getX();
    }
    public function getELimit(){
        return $this->rightTopPoint->getX();
    }
}