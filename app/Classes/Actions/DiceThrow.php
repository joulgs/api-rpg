<?php

namespace App\Classes\Actions;

use App\Classes\Entity\Dice;

class DiceThrow
{
    private $move;
    private $bonus;

    private const DICE_DELIMITER = 'D';

    public function roll()
    {
        $hand = $this->splitMove();
        $result = 0;
        foreach ($hand as $play)
        {
            $dice = new Dice;
            $dice->setSides($play[1]);
            for($diceAmount = 1; $diceAmount <= $play[0] ; $diceAmount++ )
            {
                $result += $dice->roll();
            }
        }

        $result += $this->getBonus();

        return $result;
    }

    public function setMove(String $comand) : void
    {
        $this->move = strtoupper(trim($comand));
    }

    private function splitMove()
    {
        $plays = explode('+', $this->move);
        $hand = [];

        foreach($plays as $key => $play)
        {
            if( strpos($play,self::DICE_DELIMITER) > 0)
            {
                $hand[$key] = explode(self::DICE_DELIMITER,$play);
            } else {
                $this->addBonus($play);
            }
        }

        return $hand;
    }

    private function addBonus($value) : void
    {
        $this->bonus += $value;
    }

    private function getBonus()
    {
        return $this->bonus;
    }
}
