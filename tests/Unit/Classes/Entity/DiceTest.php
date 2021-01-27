<?php

namespace Tests\Unit;

use App\Classes\Entity\Dice;
use PHPUnit\Framework\TestCase;

class DiceRollTest extends TestCase
{
    /**
     * @test
     */
    public function ensuresCorrectCalculation()
    {
        // $dice = $this->createMock(Dice::class);
        // $dice->method('roll')
        //      ->willReturn(3);

        $dice = new Dice(20);

        $rolling = $dice->roll();

        $this->assertIsInt($rolling);

    }
}
