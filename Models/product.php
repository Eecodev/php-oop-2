<?php

//properties all three have in common
class Product
{
    protected int $id;
    protected string $title;
    protected string $image;
    protected float $price;
    protected int $availability;

    public function __construct($id, $title, $image, $price, $availability)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->price = floatval($price);
        $this->availability = $availability;    
    }

}
?>