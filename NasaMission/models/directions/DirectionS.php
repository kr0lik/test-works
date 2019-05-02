<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;

/**
 * Class DirectionS
 * @package app\models\directions
 */
class DirectionS extends AbstractDirection
{
    /**
     * @var int
     */
    protected $yShift = -1;

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toLeft(): DirectionInterface
    {
        return DirectionFactory::create('E');
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create('W');
    }
}
