<?php

namespace App\Classes\Actions;

use App\Classes\Entity\Dice;

class DiceThrow
{
    private $move;

    public function roll()
    {
        $hand = explode(',', $this->move);

        $result = 0;
        foreach ($hand as $play)
        {
            $dice = new Dice;
            $diceInfo = explode('d',$play);
            $dice->setSides($diceInfo[1]);
            $result += $dice->roll();

        }

        return $result;
    }

    public function setMove(String $comand) : void
    {
        $this->move = trim($comand);


    }
}
