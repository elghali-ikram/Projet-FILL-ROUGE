<?php 
require_once(__ROOT__ . '/Entity/category.php');
class Gestioncategory {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($category){
        $name = $category->getName();
        $query = "INSERT INTO categories(`name_category`) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT id_category, name_category FROM categories';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $category_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categorys = array();
        foreach ($category_data as $category_data) {
            $category = new category();
            $category->setId($category_data['id_category']);
            $category->setName($category_data['name_category']);
            array_push($categorys, $category);
        }
        return $categorys;
    }
    public function Delete($id){
        $sql = "DELETE FROM categories WHERE id_category = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function Modifier($id, $name)
    {
    $sql = "UPDATE categories SET 
        name_category=:name
        WHERE id_category= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
