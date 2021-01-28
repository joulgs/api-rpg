<?php

namespace Tests\Unit\App\Classes\Actions;

use App\Classes\Actions\DiceThrow;
use App\Classes\Entity\Dice;
use PHPUnit\Framework\TestCase;

class DiceRollTest extends TestCase
{
    /**
     * @test
     */
    public function mustConvertAStringOfPlayCorrectly()
    {
        $diceThrow = new DiceThrow;

        $diceThrow->setMove('1d20,2d100');

        $result = $diceThrow->roll();

        $this->assertIsInt($result);
    }
}
