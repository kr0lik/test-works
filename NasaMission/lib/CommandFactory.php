<?php
namespace app\lib;

use app\exception\CommandNotExistException;
use app\interfaces\CommandInterface;
use app\models\commands\{CommandL, CommandM, CommandR};

/**
 * Class CommandFactory
 * @package app\lib
 */
class CommandFactory
{
    /**
     * @var array
     */
    private static $map = [
        CommandL::class,
        CommandR::class,
        CommandM::class
    ];

    /**
     * @param string $type
     * @return CommandInterface
     * @throws CommandNotExistException
     */
    public static function create(string $type): CommandInterface
    {
        foreach (self::$map as $class) {
            if ($class::getType() === $type) return new $class();
        }

        throw new CommandNotExistException("Unknown command - '{$type}'");
    }
}
