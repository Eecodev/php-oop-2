<?php

//properties all three have in common
class Product
{
    protected int $id;
    private string $title;
    protected string $image;

    public function __construct($id, $title, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
    }

}
?>