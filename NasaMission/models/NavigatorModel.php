<?php
namespace app\models;

use app\exception\OutOfAreaException;
use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;
use app\interfaces\NavigatorInterface;

/**
 * Class NavigatorModel
 * @package app\models
 */
class NavigatorModel implements NavigatorInterface
{
    /**
     * @var AreaInterface
     */
    protected $area;

    /**
     * @var CoordinatesInterface
     */
    protected $coordinates;

    /**
     * @var DirectionInterface
     */
    protected $direction;

    /**
     * @var int
     */
    protected $xStep = 1;

    /**
     * @var int
     */
    protected $yStep = 1;

    /**
     * NavigatorModel constructor.
     * @param AreaInterface $area
     * @param CoordinatesInterface $coordinates
     * @param DirectionInterface $direction
     * @throws OutOfAreaException
     */
    public function __construct(AreaInterface $area, CoordinatesInterface $coordinates, DirectionInterface $direction)
    {
        $this->area = $area;

        if (! $this->area->inArea($coordinates)) {
            throw new OutOfAreaException();
        }

        $this->coordinates = $coordinates;
        $this->direction = $direction;
    }

    /**
     * @param int $step
     * @return NavigatorInterface
     */
    public function setXStep(int $step): NavigatorInterface
    {
        $this->xStep = $step;

        return $this;
    }

    /**
     * @param int $step
     * @return NavigatorInterface
     */
    public function setYStep(int $step): NavigatorInterface
    {
        $this->yStep = $step;

        return $this;
    }

    /**
     * @return NavigatorInterface
     */
    public function turnLeft(): NavigatorInterface
    {
        $this->direction = $this->direction->toLeft();

        return $this;
    }

    /**
     * @return NavigatorInterface
     */
    public function turnRight(): NavigatorInterface
    {
        $this->direction = $this->direction->toRight();

        return $this;
    }

    /**
     * @return NavigatorInterface
     * @throws OutOfAreaException
     */
    public function move(): NavigatorInterface
    {
        $newX = $this->coordinates->getX() + ($this->direction->getXShift() * $this->xStep);
        $newY = $this->coordinates->getY() + ($this->direction->getYShift() * $this->yStep);

        $newCoordinates = new CoordinatesModel($newX, $newY);

        if (! $this->area->inArea($newCoordinates)) {
            throw new OutOfAreaException();
        }

        $this->coordinates = $newCoordinates;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return "{$this->coordinates->toString()} {$this->direction->getName()}";
    }
}