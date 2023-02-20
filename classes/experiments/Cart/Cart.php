<?php

namespace classes\experiments\Cart;

class Cart
{
    public array $items;

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function getTotalCount() : int
    {
        $total = 0;

        foreach( $this->items as $item )
        {
            $total += $item->getPrice();
        }

        return $total;
    }

    public function getTotalCountWithDiscount() : int
    {
        $total = 0;

        foreach( $this->items as $item )
        {
            $total += $item->getPriceWithDiscount();
        }

        return $total;
    }

    public function getTotalDiscountProfit() : int
    {
        $total = 0;

        foreach( $this->items as $item )
        {
            $total += $item->getDiscountProfit();
        }

        return $total;
    }
}