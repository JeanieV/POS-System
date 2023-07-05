<?php

class MenuItem {

    // fields
    public string $name;

    public int $price;

    public int $barcode;

    // constructor
    function __construct(int $barcode, string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->barcode = $barcode;
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
}

?>