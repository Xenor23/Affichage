<?php

class Product {
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity) 
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);
    }

    // Setters
    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function setPrice(float $price) : void {
        $this->price = $price;
    }

    public function setQuantity(int $quantity) : void {
        $this->quantity = $quantity;
    }

    // Getters
    public function getName() : string {
        return $this->name;
    }

    public function getPrice() : float {
        return $this->price;
    }

    public function getQuantity() : int {
        return $this->quantity;
    }
}