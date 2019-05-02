<?php
namespace app\interfaces;

/**
 * Interface DirectionInterface
 * @package app\interfaces
 */
interface DirectionInterface
{
    /**
     * @return DirectionInterface
     */
    public function toRight(): self;

    /**
     * @return DirectionInterface
     */
    public function toLeft(): self;

    /**
     * @return int
     */
    public function getXShift(): int;

    /**
     * @return int
     */
    public function getYShift(): int;

    /**
     * @return string
     */
    public function getName(): string;
}
