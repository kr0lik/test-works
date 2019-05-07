<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;
use app\lib\DirectionTypeEnum;

/**
 * Class DirectionE
 * @package app\models\directions
 */
class DirectionE extends AbstractDirection
{
    /**
     * @var int
     */
    protected $xShift = 1;

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toLeft(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_NORTH);
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_SOUTH);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return DirectionTypeEnum::TYPE_EAST;
    }
}
