<?php
/**
 * Created by PhpStorm.
 * User: krolik
 * Date: 11.03.2019
 * Time: 20:24
 */

namespace app\tests;

use app\lib\DirectionTypeEnum;
use PHPUnit\Framework\TestCase;
use app\lib\DirectionFactory;

class DirectionModelTest extends TestCase
{
    protected $direction;

    public function setUp()
    {
        $this->direction = DirectionFactory::create(DirectionTypeEnum::TYPE_NORTH);
    }

    public function testToRight()
    {
        $this->assertEquals(1, $this->direction->toRight()->getXShift());
        $this->assertEquals(0, $this->direction->toRight()->getYShift());
    }

    public function testToLeft()
    {
        $this->assertEquals(-1,  $this->direction->toLeft()->getXShift());
        $this->assertEquals(0,  $this->direction->toLeft()->getYShift());
    }

    public function testGetXShift()
    {
        $this->assertEquals(0, $this->direction->getXShift());
    }

    public function testGetYShift()
    {
        $this->assertEquals(1, $this->direction->getYShift());
    }

    public function testToString()
    {
        $this->assertEquals(DirectionTypeEnum::TYPE_NORTH, $this->direction::getType());
    }
}
