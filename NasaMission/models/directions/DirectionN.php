<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;

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
        return DirectionFactory::create('W');
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create('E');
    }
}
