<?php 
require_once(__ROOT__ . '/Entity/association.php');
class Gestionassociation {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($association, $table){
        $idproduct = $association->getIdproduct();
        $idassociation = $association->getIdassociation();
        $query = "INSERT INTO $table(`Id_product`,`Id_association`) VALUES (:idproduct,:idassociation)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idproduct', $idproduct);
        $stmt->bindParam(':idassociation', $idassociation);
        $stmt->execute();
    }
    public function Select($where,$table) {
        $sql = "SELECT Id_product, Id_association FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $association_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $associations = array();
        foreach ($association_data as $association_data) {
            $association = new association();
            $association->setIdassociation($association_data['Id_association']);
            $association->setIdproduct($association_data['Id_product']);
            array_push($associations, $association);
        }
        return $associations;
    }
    public function Delete($id,$table){
        $sql = "DELETE FROM $table WHERE Id_product = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    // public function Modifier($id, $name)
    // {
    // $sql = "UPDATE categories SET 
    //     name_association=:name
    //     WHERE id_association= :id";
    // $stmt = $this->db->prepare($sql);
    // $stmt->bindParam(':name', $name);
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();
    // }
}
?>
