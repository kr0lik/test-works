<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;
use app\lib\DirectionFactory;

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
        return DirectionFactory::create('N');
    }

    /**
     * @return DirectionInterface
     * @throws \app\exception\DirectionNotExistException
     */
    public function toRight(): DirectionInterface
    {
        return DirectionFactory::create('S');
    }
}
