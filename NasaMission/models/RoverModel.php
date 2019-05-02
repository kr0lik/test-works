<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;
use app\interfaces\NavigatorInterface;
use app\interfaces\RoverInterface;

/**
 * Class RoverModel
 * @package app\models
 */
class RoverModel implements RoverInterface
{
    /**
     * @var NavigatorInterface
     */
    protected $navigation;

    /**
     * RoverModel constructor.
     * @param NavigatorInterface $navigation
     */
    public function __construct(NavigatorInterface $navigation)
    {
        $this->navigation = $navigation;
    }

    /**
     * @return NavigatorInterface
     */
    public function getNavigator(): NavigatorInterface
    {
        return $this->navigation;
    }

    /**
     *
     */
    public function makePhoto()
    {
        // TODO: Implement makePhoto() method.
    }
}