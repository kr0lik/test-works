<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};

/**
 * Class CommandM
 * @package app\models\commands
 */
class CommandM implements CommandInterface
{
    /**
     * @param RoverInterface $rover
     */
    public function do(RoverInterface $rover): void
    {
        $rover->getNavigator()->move();
    }
}