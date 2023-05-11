<?php
class Projet{
    private $Id;
    private $Nom;
    private $description;
    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }
    public function getNom() {
        return $this->Nom;
    }
    public function setNom($nom) {
        $this->Nom = $nom;
    }

    public function getdescription() {
        return $this->description;
    }
    public function setdescription($description) {
        $this->description = $description;
    }
}
?>