<?php

class MenuItem {

    // fields
    public string $name;

    public int $price;

    public int $barcode;
    
    public $image;
    

    // constructor
    function __construct(int $barcode, string $name, int $price, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->barcode = $barcode;
        $this->image = $image;
    }

    // Methods
    public function get_name()
    {
        return $this->name;
    }
    function set_name($name)
    {
        $this->name = $name;
    }
    
    public function get_price()
    {
        return $this->price;
    }
    function set_price($price)
    {
        $this->price = $price;
    }
    public function get_barcode()
    {
        return $this->barcode;
    }
    function set_barcode($barcode)
    {
        $this->barcode = $barcode;
    }

    public function get_image()
    {
        return $this->image;
    }
    function set_image($image)
    {
        $this->image = $image;
    }
}

?>