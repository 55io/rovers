<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 25.02.2018
 * Time: 21:45
 */

use VSalin\Reader\Reader;
use VSalin\Point\Point;
use VSalin\Plateau\Plateau;
use VSalin\Rover\Rover;

require __DIR__ . '/vendor/autoload.php';
$inpuFilePath = "input.txt";
$outpuFilePath = "output.txt";

$myReader = new Reader($inpuFilePath);
$commands = $myReader->readFromFile();
$plateau = new Plateau(Point::fromArray($commands[0]));
for ($i = 2; $i <= count($commands); $i += 2) {
    $roverStartPoint = new Point($commands[$i - 1][0], $commands[$i - 1][1]);
    $newRover = new Rover($roverStartPoint, $commands[$i - 1][2], $plateau);
    $result[] = $newRover->handleCommands($commands[$i][0]);
}
$textResult = implode(PHP_EOL . PHP_EOL, $result);
file_put_contents($outpuFilePath, $textResult);