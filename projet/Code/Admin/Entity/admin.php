<?php

class Admin {
    private $Id;
    private $Name;
    private $Email;
    private $Password;



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
    public function getEmail() {
        return $this->Email;
    }
    public function setEmail($email) {
        $this->Email = $email;
    }

    public function getPassword() {
        return $this->Password;
    }
    public function setPassword($Password) {
        $this->Password = $Password;
    }
}
?>