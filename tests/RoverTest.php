<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 07.06.2018
 * Time: 21:55
 */

use VSalin\Point\Point;
use VSalin\Plateau\Plateau;
use VSalin\Rover\Rover;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';
$inpuFilePath = "input.txt";
$outpuFilePath = "output.txt";

final class TestRover extends TestCase
{
    /**
     * @dataProvider providerRoverHandlingCommands
     */

    public function testRoverHandlingCommands($a, $b, $c, $d)
    {
        $plateauPoint = Point::fromArray($a);
        $plateau = new Plateau($plateauPoint);
        $roverPoint = new Point($b[0], $b[1]);
        $rover = new Rover($roverPoint, $b[2], $plateau);
        $this->assertEquals($rover->handleCommands($c), $d);
    }

    public function providerRoverHandlingCommands()
    {
        return array(
            array([5, 5], [1, 2, 'N'], 'LMLMLMLMM', '1 3 N'),
            array([5, 5], [3, 3, 'E'], 'MMRMMRMRRM', '5 1 E'),
            array([1, 1], [0, 0, 'N'], 'MMMM', '0 1 N'),
            array([2, 1], [2, 1, 'N'], 'MMMM', '2 1 N')
        );
    }
}