<?php

namespace App\Domains\Tests\Dice;

use App\Domains\Dice\DiceThrow;
use PHPUnit\Framework\TestCase;

class DiceTrownTest extends TestCase
{
    /**
     * @test
     * @dataProvider throws
     */
    public function mustConvertAStringOfPlayCorrectly($throw, $max)
    {
        $diceThrow = new DiceThrow;

        $diceThrow->setMove($throw);

        $result = $diceThrow->roll();

        $this->assertIsInt($result);
        $this->assertLessThanOrEqual($max, $result);
    }

    public function throws()
    {
        return [
            'simpleHand' => ['throw' => '1d20', 'max' => 20],
            'simpleHandWhitUpper' => ['throw' => '1D4', 'max' => 4],
            'twoTypeOfDices' => ['throw' => '1D4&1D6', 'max' => 10],
            'threTypeOfDices' => ['throw' => '1D4&1D6&1D8', 'max' => 18],
            'moreAmountOfDices' => ['throw' => '3d4', 'max' => 12],
            'moreAmountOfDicesWhitTwoTypes' => ['throw' => '2d2&1D4', 'max' => 8],
            'verifyMaxValue' => ['throw' => '1d1&1D1', 'max' => 2],
            'moreAmountOfDicesOfSameTypes' => ['throw' => '2d2&2D2', 'max' => 8],
            'simpleHandWhitBonusAdd' => ['throw' => '1d20+2', 'max' => 22],
            'testWhitBonus' => ['throw' => '1d1+2', 'max' => 3],
            'threTypeOfDicesWhitBonu' => ['throw' => '1D4&1D6&1D8+5', 'max' => 23],
            'verifyConstancy' => ['throw' => '1d1-1', 'max' => 0],
        ];
    }
}
