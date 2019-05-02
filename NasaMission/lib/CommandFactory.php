<?php
namespace app\lib;

use app\exception\CommandNotExistException;
use app\interfaces\CommandInterface;

/**
 * Class CommandFactory
 * @package app\lib
 */
class CommandFactory
{
    /**
     * @param string $name
     * @return CommandInterface
     * @throws CommandNotExistException
     */
    public static function create(string $name): CommandInterface
    {
        $class = 'app\models\commands\Command' . strtoupper($name);

        if (! class_exists($class)) {
            throw new CommandNotExistException("Unknown command name - '{$name}'");
        }

        return new $class();
    }
}
