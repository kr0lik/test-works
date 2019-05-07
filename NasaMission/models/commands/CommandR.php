<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};
use app\lib\CommandTypeEnum;

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

    /**
     * @return string
     */
    public static function getType(): string
    {
        return CommandTypeEnum::TYPE_RIGHT;
    }
}