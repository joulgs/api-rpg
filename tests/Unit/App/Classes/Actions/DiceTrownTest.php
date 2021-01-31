<?php

namespace Tests\Unit\App\Classes\Actions;

use App\Classes\Actions\DiceThrow;
use App\Classes\Entity\Dice;
use PHPUnit\Framework\TestCase;

class DiceRollTest extends TestCase
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
            'TwoTypeOfDices' => ['throw' => '1D4+1D6', 'max' => 10],
            'ThreTypeOfDices' => ['throw' => '1D4+1D6+1D8', 'max' => 18],
            'MoreAmountOfDices' => ['throw' => '3d4', 'max' => 12],
            'MoreAmountOfDicesWhitTwoTypes' => ['throw' => '2d2+1D4', 'max' => 8],
            'VerifyMaxValue' => ['throw' => '1d1+1D1', 'max' => 2],
            'MoreAmountOfDicesOfSameTypes' => ['throw' => '2d2+2D2', 'max' => 8],
            'simpleHandWhitBonusAdd' => ['throw' => '1d20+2', 'max' => 22],
            'testWhitBonus' => ['throw' => '1d1+2', 'max' => 3],
        ];
    }
}
