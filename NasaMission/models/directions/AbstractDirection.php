<?php
namespace app\models\directions;

use app\interfaces\DirectionInterface;

/**
 * Class AbstractDirection
 * @package app\models\directions
 */
abstract class AbstractDirection implements DirectionInterface
{
    /**
     * @var int
     */
    protected $xShift = 0;

    /**
     * @var int
     */
    protected $yShift = 0;

    /**
     * @return int
     */
    public function getXShift(): int
    {
        return $this->xShift;
    }

    /**
     * @return int
     */
    public function getYShift(): int
    {
        return $this->yShift;
    }

    /**
     * @return DirectionInterface
     */
    abstract public function toLeft(): DirectionInterface;

    /**
     * @return DirectionInterface
     */
    abstract public function toRight(): DirectionInterface;

    /**
     * @return string
     */
    abstract public static function getType(): string;
}
