<?php

namespace classes\experiments\Product;

use classes\experiments\Price\Price;

class Product
{
    private string $name;
    private Price $price;

    /**
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name, Price $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price->getPrice();
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price->setPrice( $price );
    }

    public function getPriceWithDiscount() : int
    {
        return $this->price->getPriceWithDiscount();
    }

    public function getDiscountProfit() : int
    {
        return $this->price->getDiscountProfit();
    }
}