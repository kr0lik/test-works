<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;

/**
 * Class AreaModel
 * @package app\models
 */
class AreaModel implements AreaInterface
{
    /**
     * @var CoordinatesInterface
     */
    protected $startCoordinates;

    /**
     * @var CoordinatesInterface
     */
    protected $topCoordinates;

    /**
     * AreaModel constructor.
     * @param CoordinatesInterface $topCoordinates
     * @param CoordinatesInterface|null $startCoordinates
     */
    public function __construct(CoordinatesInterface $topCoordinates, CoordinatesInterface $startCoordinates = null)
    {
        $this->topCoordinates = $topCoordinates;
        $this->startCoordinates = $startCoordinates ?: new CoordinatesModel(0, 0);
    }

    /**
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    public function inArea(CoordinatesInterface $coordinates): bool
    {
        return  $this->startCoordinates->getX() <= $coordinates->getX() && $this->startCoordinates->getY() <= $coordinates->getY() &&
            $this->topCoordinates->getX() >= $coordinates->getX() && $this->topCoordinates->getY() >= $coordinates->getY();
    }
}