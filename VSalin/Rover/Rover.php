<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 06.06.2018
 * Time: 15:28
 */

namespace VSalin\Rover;

use VSalin\Plateau\Plateau;
use VSalin\Point\Point;

class Rover
{
    static $moveCommands = ['M'];
    static $rotateCommands = ['L', 'R'];
    private $location;
    private $direction;
    private $plateau;

    function __construct(Point $roverCoords, $direction, Plateau $plateau)
    {
        $this->location = $roverCoords;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }

    public function handleCommands($commands)
    {
        $parsedCommands = self::parseCommands($commands);
        foreach ($parsedCommands as $command) {
            $this->handleCommand($command);
        }
        return $this->getResult();
    }

    private function handleCommand($command)
    {
        if (in_array($command, self::$moveCommands)) {
            $this->move();
        } elseif (in_array($command, self::$rotateCommands)) {
            $this->rotate($command);
        }
    }

    static function parseCommands($commands)
    {
        return preg_split("//", $commands, -1, PREG_SPLIT_NO_EMPTY);
    }

    private function getResult()
    {
        return $this->location->toString() . ' ' . $this->direction;
    }

    private function rotate($rotateDirection)
    {
        switch ($this->direction) {
            case 'N':
                $this->direction = $rotateDirection == 'L' ? 'W' : 'E';
                break;
            case 'S':
                $this->direction = $rotateDirection == 'L' ? 'E' : 'W';
                break;
            case 'W':
                $this->direction = $rotateDirection == 'L' ? 'S' : 'N';
                break;
            case 'E':
                $this->direction = $rotateDirection == 'L' ? 'N' : 'S';
                break;
        }
    }

    private function move()
    {
        switch ($this->direction) {
            case 'N':
                $newY = $this->checkNMovingPossibility() ? $this->location->getY() + 1 : $this->location->getY();
                $this->location->setY($newY);
                break;
            case 'S':
                $newY = $this->checkSMovingPossibility() ? $this->location->getY() - 1 : $this->location->getY();
                $this->location->setY($newY);
                break;
            case 'W':
                $newX = $this->checkWMovingPossibility() ? $this->location->getX() - 1 : $this->location->getX();
                $this->location->setX($newX);
                break;
            case 'E':
                $newX = $this->checkEMovingPossibility() ? $this->location->getX() + 1 : $this->location->getX();
                $this->location->setX($newX);
                break;
        }
    }

    private function checkNMovingPossibility()
    {
        return $this->location->getY() < $this->plateau->getNLimit();
    }

    private function checkSMovingPossibility()
    {
        return $this->location->getY() > $this->plateau->getSLimit();
    }

    private function checkWMovingPossibility()
    {
        return $this->location->getX() > $this->plateau->getWLimit();
    }

    private function checkEMovingPossibility()
    {
        return $this->location->getX() < $this->plateau->getELimit();
    }

}