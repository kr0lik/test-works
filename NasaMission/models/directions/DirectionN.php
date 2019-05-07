<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;
use app\lib\DirectionTypeEnum;

/**
 * Class DirectionN
 * @package app\models\directions
 */
class DirectionN extends AbstractDirection
{
    /**
     * @var int
     */
    protected $yShift = 1;

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toLeft(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_WEST);
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create(DirectionTypeEnum::TYPE_EAST);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return DirectionTypeEnum::TYPE_NORTH;
    }
}
