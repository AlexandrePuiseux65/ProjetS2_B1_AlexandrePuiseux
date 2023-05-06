<?php

require_once('./classes/Ennemi.php');

class Skeleton extends Ennemi
{ 
    public function __construct()
    {
        $this->pol = 5;
        $this->name = "Skelette";
        $this->power = 3;
        $this->constitution = 4;
        $this->speed = 9;
        $this->xp = 2;
        $this->gold = 1;
    }

    //Fonction de fuite 
    public function runaway()
    {

    }
}