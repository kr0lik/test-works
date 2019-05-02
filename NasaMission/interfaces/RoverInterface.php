<?php
namespace app\interfaces;

/**
 * Interface RoverInterface
 * @package app\interfaces
 */
interface RoverInterface
{
    /**
     * @return NavigatorInterface
     */
    public function getNavigator(): NavigatorInterface;

    /**
     * @return mixed
     */
    public function makePhoto();
}