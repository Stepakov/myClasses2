<?php

namespace classes\experiments\Discount;

class Discount
{
    private float $discount;

    /**
     * @param float $discount
     */
    public function __construct(float $discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount( float $percent ) : void
    {
        $this->discount = $percent;
    }
}