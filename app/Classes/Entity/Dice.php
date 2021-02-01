<?php

namespace App\Classes\Entity;

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
