<?php
namespace app\components;

use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;
use app\lib\{CommandFactory, DirectionFactory};
use app\models\CoordinatesModel;

/**
 * Class Input
 * @package app\components
 */
class Input
{
    /**
     * @param string $input
     * @return CoordinatesInterface
     * @throws \Exception
     */
    public static function coordinatesFromString(string $input): CoordinatesInterface
    {
        $inputs = self::toArray($input);

        [$x, $y] = $inputs;

        if ($x === null || $y === null) {
            throw new \Exception(sprintf("Command must be format '%s' given '%s'",
                'X Y',
                $input
            ));
        }

        if (filter_var($x, FILTER_VALIDATE_INT) === false) {
            throw new \Exception(sprintf("X coordinate must be integer, given '%s'",
                $x
            ));
        }

        if (filter_var($y, FILTER_VALIDATE_INT) === false) {
            throw new \Exception(sprintf("Y coordinate must be integer, given '%s'",
                $y
            ));
        }

        return new CoordinatesModel($x, $y);
    }

    /**
     * @param string $input
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public static function directionFromString(string $input): DirectionInterface
    {
        return self::coordinatesAndDirectionFromString($input)['direction'];
    }

    /**
     * Return ['coordinates', 'direction']
     *
     * @param string $input
     * @return array
     * @throws \app\exception\DirectionNotExistException
     */
    public static function coordinatesAndDirectionFromString(string $input): array
    {
        $inputs = self::toArray($input);

        [$x, $y, $direction] = $inputs;

        if ($x === null || $y === null || $direction === null) {
            throw new \Exception(sprintf("Command must be format '%s' given '%s'",
                'X Y Z',
                $input
            ));
        }

        return [
            'coordinates' => self::coordinatesFromString("$x $y"),
            'direction' => DirectionFactory::create($direction)
        ];
    }

    /**
     * Return [CommandInterface]
     *
     * @param string $input
     * @return array
     * @throws \Exception
     */
    public static function roverCommandsFromString(string $input): array
    {
        $inputs = self::toArray($input);

        array_map(function($item) {
            if (! is_string($item)) throw new \Exception(sprintf("Command must be string, given '%s'",
                $item
            ));
        }, $inputs);

        $commands = [];
        foreach ($inputs as $input) {
            $commands[] = CommandFactory::create($input);
        }

        return $commands;
    }

    /**
     * @param string $input
     * @return array
     */
    protected static function toArray(string $input): array
    {
        return array_values(
            array_map(
                'strtoupper',
                array_filter(
                    str_split (
                        trim($input)
                    ),
                    function ($val) {
                        return $val !== ' ' && $val !== '';
                    }
                )
            )
        );
    }
}
