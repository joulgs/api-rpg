<?php

namespace App\Classes\Actions;

use App\Classes\Entity\Dice;

class DiceThrow
{
    private const DICE_DELIMITER = 'D';
    private const DICE_CONCATENATOR = '&';
    private $move;
    private $bonus = 0;

    public function roll()
    {
        $result = 0;

        $this->bonus($this->move);

        $hand = $this->splitMove();

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
        $plays = explode(self::DICE_CONCATENATOR, $this->move);
        $hand = [];

        foreach($plays as $key => $play)
        {
            $hand[$key] = explode(self::DICE_DELIMITER,$play);
        }

        return $hand;
    }

    private function setBonus($value) : void
    {
        $this->bonus += $value;
    }

    private function getBonus()
    {
        return $this->bonus;
    }

    private function hasBonus($value)
    {
        if(strpos($value, '+') > 0 || strpos($value, '-') > 0)
            return true;

        return false;
    }

    private function bonus($value)
    {
        if( ! $this->hasBonus($value))
            return;

        if(strpos($value, '+') > 0)
            $delimiter = '+';
        else
            $delimiter = '-';

        $playAndBonus = explode($delimiter, $value);
        $this->setMove($playAndBonus[0]);

        $bonusValue = intval($delimiter.$playAndBonus[1]);
        $this->setBonus($bonusValue);
    }
}
