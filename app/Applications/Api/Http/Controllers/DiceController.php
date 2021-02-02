<?php

namespace App\Applications\Api\Http\Controllers;

use App\Domains\Dice\DiceThrow;

class DiceController extends BaseController
{
    public function roll( $jogada, DiceThrow $diceThrow)
    {
        $diceThrow->setMove($jogada);

        $result = $diceThrow->roll();
        return response()->json($result);
    }
}
