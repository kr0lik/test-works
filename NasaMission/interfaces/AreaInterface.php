<?php
namespace app\interfaces;

/**
 * Interface AreaInterface
 * @package app\interfaces
 */
interface AreaInterface
{
    /**
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    public function inArea(CoordinatesInterface $coordinates): bool;
}