<?php
namespace app\lib;

use app\exception\DirectionNotExistException;
use app\interfaces\DirectionInterface;
use app\models\directions\{DirectionE, DirectionN, DirectionS, DirectionW};

/**
 * Class DirectionFactory
 * @package app\lib
 */
class DirectionFactory
{
    /**
     * @var array
     */
    private static $map = [
        DirectionN::class,
        DirectionE::class,
        DirectionS::class,
        DirectionW::class
    ];

    /**
     * @param string $type
     * @return DirectionInterface
     * @throws DirectionNotExistException
     */
    public static function create(string $type): DirectionInterface
    {
        foreach (self::$map as $class) {
            if ($class::getType() === $type) return new $class();
        }

        throw new DirectionNotExistException("Unknown direction name - '{$type}'");
    }
}