<?php

require_once('./classes/Ennemi.php');

class Spirit extends Ennemi
{ 
    public function __construct()
    {
        $this->pol = 5;
        $this->name = "Esprit";
        $this->power = 5;
        $this->constitution = 10;
        $this->speed = 7;
        $this->xp = 30;
        $this->gold = 0;
    }

    //Fonction de fuite 
    public function runaway()
    {

    }
}