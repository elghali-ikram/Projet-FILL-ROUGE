<?php

class Color {

    private $Code;
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

    public function getCode() {
        return $this->Code;
    }
    public function setCode($code) {
        $this->Code = $code;
    }
}
?>