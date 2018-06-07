<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 07.06.2018
 * Time: 17:35
 */

use VSalin\Point\Point;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';
$inpuFilePath = "input.txt";
$outpuFilePath = "output.txt";

final class TestPoint extends TestCase
{
    public function testCanBeCreatedFromArray(): void
    {
        $this->assertInstanceOf(
            Point::class,
            Point::fromArray([0, 0])
        );
    }

    /**
     * @dataProvider providerToString
     */
    public function testToString($a, $b)
    {
        $my = new Point($a, $b);
        $this->assertEquals($a . ' ' . $b, $my->toString());
    }

    public function providerToString()
    {
        return array(
            array(0, 0),
            array(1, 3),
            array(2, 5)
        );
    }
}