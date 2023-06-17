<?php

class Contact {
    private $Id;
    private $Name;
    private $Email;
    private $Message;


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

    public function getMessage() {
        return $this->Message;
    }
    public function setMessage($message) {
        $this->Message = $message;
    }
}
?>