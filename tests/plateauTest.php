<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 07.06.2018
 * Time: 21:37
 */

use VSalin\Point\Point;
use VSalin\Plateau\Plateau;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';
$inpuFilePath = "input.txt";
$outpuFilePath = "output.txt";

final class TestPlateau extends TestCase
{
    /**
     * @dataProvider providerToString
     */

    public function testLimits($a, $b)
    {
        $myPoint = new Point($a, $b);
        $my = new Plateau($myPoint);
        $this->assertEquals(0, $my->getSLimit());
        $this->assertEquals(0, $my->getWLimit());
        $this->assertEquals($b, $my->getNLimit());
        $this->assertEquals($a, $my->getELimit());
    }

    public function providerToString()
    {
        return array(
            array(1, 1),
            array(3, 5),
            array(9, 4)
        );
    }
}