<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use app\components\Input;
use app\models\{RoverModel, AreaModel, NavigatorModel};

$input = '5 5';
echo "Enter the upper-right coordinates of the plateau($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
$area = new AreaModel(Input::coordinatesFromString($input));

$input = '1 2 N';
echo "Enter first rover's position($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
$rover1 = new RoverModel(new NavigatorModel($area, Input::coordinatesFromString($input), Input::directionFromString($input)));

$input = 'LMLMLMLMM';
echo "Enter a series of instructions telling the first rover how to explore the plateau($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
foreach (Input::roverCommandsFromString($input) as $command) {
    $command->do($rover1);
}

$input = '3 3 E';
echo "Enter second rover's position($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
$rover2 = new RoverModel(new NavigatorModel($area, Input::coordinatesFromString($input), Input::directionFromString($input)));

$input = 'MMRMMRMRRM';
echo "Enter a series of instructions telling the second rover how to explore the plateau($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
foreach (Input::roverCommandsFromString($input) as $command) {
    $command->do($rover2);
}

echo "\r\n";
echo "Results: \r\n";
echo $rover1->getNavigator()->getPosition();
echo "\r\n";
echo $rover2->getNavigator()->getPosition();
echo "\r\n";
