<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\models\AreaModel;
use app\components\Input;

class AreaModelTest extends TestCase
{
    protected $area;

    public function setUp()
    {
        $this->area = new AreaModel(Input::coordinatesFromString('5 5'));
    }

    /**
     * @dataProvider dataInArea
     */
    public function testInArea($testedValue, $coordinates)
    {
        $this->assertEquals($testedValue, $this->area->inArea(Input::coordinatesFromString($coordinates)));
    }

    public function dataInArea()
    {
        return [
            [true, '5 5'],
            [false, '6 6']
        ];
    }
}
