<?php

use PHPUnit\Framework\TestCase;
use App\FloorCleaning;

class FloorCleaningTest extends TestCase
{
    public function testFloorCleaningWithInvalidArea(): void
    {
        $this->expectException(TypeError::class);
        new FloorCleaning('carpet', 'fswerw');
    }

    public function testFloorCleaningWithInvalidFloor(): void
    {
        $this->expectException(ErrorException::class);
        $instance = new FloorCleaning('noexistingFloor', 120);
        $instance->setCleaningInstance();
    }

    public function testFloorCleaningWithCorrectParamters(): void
    {
        $instance = new FloorCleaning('carpet', 120);
        $instance->setCleaningInstance();
        $response = $instance->startCleaning();
        $this->assertEquals('Cleaning done', $response);
    }
}