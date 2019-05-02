<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};

/**
 * Class CommandR
 * @package app\models\commands
 */
class CommandR implements CommandInterface
{
    /**
     * @param RoverInterface $rover
     */
    public function do(RoverInterface $rover): void
    {
        $rover->getNavigator()->turnRight();
    }
}