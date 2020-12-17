<?php
include "Slates.php";

class ColoredSlates extends SLates
{
    //variables
    private $color;
    private $amount;
    private $delivery;

    //constructor
    public function __construct($name, $price, $color, $amount, $delivery) {
        parent::__construct($name, $price);
        $this->color = $color;
        $this->amount = $amount;
        $this->delivery = $delivery;
    }

    //getter and setter methods
    public function getAmount()
    {
        return $this->amount;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function toString()
    {
        return $this->getName() . " slate is a good roof protector";
    }
}