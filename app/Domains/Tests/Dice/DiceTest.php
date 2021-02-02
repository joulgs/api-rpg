<?php

namespace App\Domains\Tests\Dice;

use App\Domains\Dice\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    /**
     * @test
     */
    public function ensuresCorrectCalculation()
    {
        $dice = new Dice ();
        $dice->setSides('20');

        $rolling = $dice->roll();

        $this->assertIsInt($rolling);
    }
}
