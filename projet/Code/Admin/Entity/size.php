<?php

class Size {
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
}
?>