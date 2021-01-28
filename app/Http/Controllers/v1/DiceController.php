<?php

namespace App\Http\Controllers\v1;

use App\Classes\Actions\DiceThrow;
use App\Classes\Entity\Dice;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class DiceController extends Controller
{
    public function roll( $jogada, DiceThrow $diceThrow)
    {
        $diceThrow->setMove($jogada);

        $result = $diceThrow->roll();
        return response()->json($result);
    }
}
