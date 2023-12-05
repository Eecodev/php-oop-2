<?php
class Product
{
    protected float $price;
    private int $sconto = 0;
    protected int $availability;

    public function __construct($price, $availability)
    {
        $this->price = $price;
        $this->availability = $availability;
    }

}
?>