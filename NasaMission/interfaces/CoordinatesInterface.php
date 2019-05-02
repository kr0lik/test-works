<?php
namespace app\interfaces;

/**
 * Interface CoordinatesInterface
 * @package app\interfaces
 */
interface CoordinatesInterface
{
    /**
     * @return int
     */
    public function getX(): int;

    /**
     * @return int
     */
    public function getY(): int;

    /**
     * @return string
     */
    public function toString(): string;
}