<?php
namespace app\models;

use app\interfaces\CoordinatesInterface;

/**
 * Class CoordinatesModel
 * @package app\models
 */
class CoordinatesModel implements CoordinatesInterface
{
    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * CoordinatesModel constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return "{$this->x} {$this->y}";
    }
}
