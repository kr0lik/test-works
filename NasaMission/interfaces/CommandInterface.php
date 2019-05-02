<?php
namespace app\interfaces;

/**
 * Interface CommandInterface
 * @package app\interfaces
 */
interface CommandInterface
{
    /**
     * @param RoverInterface $rover
     */
    public function do(RoverInterface $rover): void ;
}