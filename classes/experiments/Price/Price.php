<?php

namespace classes\experiments\Price;

use classes\experiments\Discount\Discount;

class Price
{
    // price in pennies
    private int $price;

    private Discount $discount;

    /**
     * @param int $price
     * @param Discount $discount
     */
    public function __construct(int $price, Discount $discount )
    {
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getPrice() : int
    {
        return $this->price;
    }

    public function setPrice( int $price ) : int
    {
        return $this->price = $price;
    }

    public function getPriceWithDiscount() : int
    {
        return $this->calculatePrice();
    }

    private function calculatePrice() : int
    {
        return $this->price - intval( $this->price * $this->discount->getDiscount() / 100 );
    }

    public function getDiscountProfit() : int
    {
        return intval( $this->price * $this->discount->getDiscount() / 100 );
    }
}