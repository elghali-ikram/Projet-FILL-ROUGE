<?php

class Association {
    private $Idproduct;
    private $Idassociation;


    public function getIdproduct() {
        return $this->Idproduct;
    }
    public function setIdproduct($Idproduct) {
        $this->Idproduct = $Idproduct;
    }
    public function getIdassociation() {
        return $this->Idassociation;
    }
    public function setIdassociation($Idassociation) {
        $this->Idassociation = $Idassociation;
    }
}
?>