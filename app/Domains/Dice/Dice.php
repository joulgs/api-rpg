<?php

namespace App\Domains\Dice;

Class Dice
{
    private $sides;

    public function roll()
    {
        return rand(1,$this->sides);
    }

    public function setSides($value)
    {
        $this->sides = $value;
    }
}
