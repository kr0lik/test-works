<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};

/**
 * Class CommandL
 * @package app\models\commands
 */
class CommandL implements CommandInterface
{
    /**
     * @param RoverInterface $rover
     */
    public function do(RoverInterface $rover): void
    {
        $rover->getNavigator()->turnLeft();
    }
}