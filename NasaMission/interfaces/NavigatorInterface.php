<?php
namespace app\interfaces;

/**
 * Interface NavigatorInterface
 * @package app\interfaces
 */
interface NavigatorInterface
{
    /**
     * @param int $step
     * @return NavigatorInterface
     */
    public function setXStep(int $step): NavigatorInterface;

    /**
     * @param int $step
     * @return NavigatorInterface
     */
    public function setYStep(int $step): NavigatorInterface;

    /**
     * @return NavigatorInterface
     */
    public function turnLeft(): NavigatorInterface;

    /**
     * @return NavigatorInterface
     */
    public function turnRight(): NavigatorInterface;

    /**
     * @return NavigatorInterface
     */
    public function move(): NavigatorInterface;

    /**
     * @return mixed
     */
    public function getPosition();
}