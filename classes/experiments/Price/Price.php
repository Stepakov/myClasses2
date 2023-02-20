<?php

namespace classes\experiments\Price;

use classes\experiments\Discount\Discount;

class Price
{
    // price in pennies
    private int $price;

    private array $discounts;

    /**
     * @param int $price
     * @param Discount $discount
     */
    public function __construct( int $price, array $discounts )
    {
        $this->price = $price;
        $this->discounts = $discounts;
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
        $totalDiscount = $this->getTotalDiscount();
        return $this->price - intval( $this->price * $totalDiscount / 100 );
    }

    public function getDiscountProfit() : int
    {
        $totalDiscount = $this->getTotalDiscount();
        return intval( $this->price * $totalDiscount / 100 );
    }

    private function getTotalDiscount() : float
    {
        $totalDiscount = 0;

        foreach( $this->discounts as $discount )
        {
            $totalDiscount += $discount->getDiscount();
        }

        return $totalDiscount;
    }
}