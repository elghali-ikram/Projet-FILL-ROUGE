<?php
include "category.php";

class Product extends Category
{
    private $Id;
    private $Name;
    private $description;
    private $price;

    public function getdescription() {
        return $this->description;
    }
    public function setdescription($description) {
        $this->description = $description;
    }
    public function getprice() {
        return $this->price;
    }
    public function setprice($price) {
        $this->price = $price;
    }

}
?>