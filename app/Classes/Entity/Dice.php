<?php

namespace App\Classes\Entity;

Class Dice
{
    private $sides;

    public function __construct($sides)
    {
        $this->sides = $sides;
    }

    public function roll()
    {
        return rand(1,$this->sides);
    }
}
