<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};
use app\lib\CommandTypeEnum;

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

    /**
     * @return string
     */
    public static function getType(): string
    {
        return CommandTypeEnum::TYPE_LEFT;
    }
}