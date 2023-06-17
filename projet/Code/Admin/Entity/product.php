<?php

class Product {
    private $Description;
    private $Price;

    private $Category;
    private $Id;
    private $Name;


    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }
    public function getName() {
        return $this->Name;
    }
    public function setName($name) {
        $this->Name = $name;
    }

    public function getDescription() {
        return $this->Description;
    }
    public function setDescription($description) {
        $this->Description = $description;
    }
    public function getPrice() {
        return $this->Price;
    }
    public function setPrice($price) {
        $this->Price = $price;
    }

    public function getCategory() {
        return $this->Category;
    }
    public function setCategory($category) {
        $this->Category = $category;
    }
}
?>