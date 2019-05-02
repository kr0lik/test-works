<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;

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
        return DirectionFactory::create('S');
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create('N');
    }
}
