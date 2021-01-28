<?php

namespace Tests\Unit\App\Classes\Entity;

use App\Classes\Entity\Dice;
use PHPUnit\Framework\TestCase;

class DiceRollTest extends TestCase
{
    /**
     * @test
     */
    public function ensuresCorrectCalculation()
    {
        $dice = new Dice();
        $dice->setSides(20);

        $rolling = $dice->roll();

        $this->assertIsInt($rolling);

    }
}
