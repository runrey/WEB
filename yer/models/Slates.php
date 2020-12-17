<?php


abstract class Slates
{
    //variables
    protected $name;
    protected $price;

    //constructor
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

}