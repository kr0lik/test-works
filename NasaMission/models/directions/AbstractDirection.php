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
     * @return DirectionInterface
     */
    abstract public function toLeft(): DirectionInterface;

    /**
     * @return DirectionInterface
     */
    abstract public function toRight(): DirectionInterface;

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
     * @return string
     * @throws \ReflectionException
     */
    public function getName(): string
    {
        return str_replace('Direction', '', (new \ReflectionClass($this))->getShortName());
    }
}
