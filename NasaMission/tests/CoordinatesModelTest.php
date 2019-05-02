<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\components\Input;

class CoordinatesModelTest extends TestCase
{
    protected $coordinates;

    public function setUp()
    {
        $this->coordinates = Input::coordinatesFromString('1 2');
    }

    public function testGetX()
    {
        $this->assertEquals(1, $this->coordinates->getX());
    }

    public function testGetY()
    {
        $this->assertEquals(2, $this->coordinates->getY());
    }

    public function testToString()
    {
        $this->assertEquals('1 2', $this->coordinates->toString());
    }
}
