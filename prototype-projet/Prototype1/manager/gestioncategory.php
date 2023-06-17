<?php 
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/category.php');
class Gestioncategory {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='projet';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($category){
        $name = $category->getName();
        $query = "INSERT INTO category(name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    public function Select() {
        $sql = 'SELECT Id_category, name FROM category';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $category_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $categorys = array();
        foreach ($category_data as $category_data) {
            $category = new category();
            $category->setId($category_data['Id_category']);
            $category->setName($category_data['name']);
            array_push($categorys, $category);
        }
        return $categorys;
    }
    public function Delete($id){
        $sql = "DELETE FROM category WHERE Id_category == :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
    }
    public function RechercherParId($id){
        $query = $this->db->prepare("SELECT * FROM category WHERE Id_category = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $category_data = $query->fetch(PDO::FETCH_ASSOC);
    
        $category = new category();
        $category->setId($category_data['Id_category']);
        $category->setName($category_data['name']);
    
        return $category;
    }
    public function Modifier($id, $name)
{
    // Requête SQL
    $sql = "UPDATE category SET 
        name=:name
        WHERE Id_category= :id";

    // Préparation de la requête
    $stmt = $this->db->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);

    // Exécution de la requête
    $stmt->execute();
}
}
?>
