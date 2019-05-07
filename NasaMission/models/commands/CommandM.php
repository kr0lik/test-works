<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};
use app\lib\CommandTypeEnum;

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

    /**
     * @return string
     */
    public static function getType(): string
    {
        return CommandTypeEnum::TYPE_MOVE;
    }
}