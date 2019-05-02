<?php
namespace app\lib;

use app\exception\DirectionNotExistException;
use app\interfaces\DirectionInterface;

/**
 * Class DirectionFactory
 * @package app\lib
 */
class DirectionFactory
{
    /**
     * @param string $name
     * @return DirectionInterface
     * @throws DirectionNotExistException
     */
    public static function create(string $name): DirectionInterface
    {
        $class = 'app\models\directions\Direction' . strtoupper($name);

        if (! class_exists($class)) {
            throw new DirectionNotExistException("Unknown direction name - '{$name}'");
        }

        return new $class();
    }
}