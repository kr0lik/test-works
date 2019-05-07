<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;
use app\lib\DirectionTypeEnum;

/**
 * Class DirectionW
 * @package app\models\directions
 */
class DirectionW extends AbstractDirection
{
    /**
     * @var int
     */
    protected $xShift = -1;

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toLeft(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_SOUTH);
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_NORTH);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return DirectionTypeEnum::TYPE_WEST;
    }
}
