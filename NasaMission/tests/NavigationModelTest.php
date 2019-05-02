<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\exception\OutOfAreaException;
use app\models\{NavigatorModel, AreaModel};
use app\components\Input;

class NavigationModelTest extends TestCase
{
    protected $navigation;

    public function setUp()
    {
        $area = new AreaModel(Input::coordinatesFromString('5 5'));
        $input = '1 2 N';

        $this->navigation = new NavigatorModel($area, Input::coordinatesFromString($input), Input::directionFromString($input));
    }

    public function testTurnLeft()
    {
        $this->navigation->turnLeft();

        $this->assertEquals('1 2 W', $this->navigation->getPosition());
    }

    public function testTurnRight()
    {
        $this->navigation->turnRight();

        $this->assertEquals('1 2 E', $this->navigation->getPosition());
    }

    public function testMoveSuccess()
    {
        $this->navigation->move();

        $this->assertEquals('1 3 N', $this->navigation->getPosition());

        $this->navigation->turnRight();
        $this->navigation->move();

        $this->assertEquals('2 3 E', $this->navigation->getPosition());
    }

    public function testMoveFail()
    {
        $this->expectException(OutOfAreaException::class);

        $this->navigation->turnLeft();
        $this->navigation->move();
        $this->navigation->move();
    }

    public function testGetPosition()
    {
        $this->assertEquals('1 2 N', $this->navigation->getPosition());
    }
}
