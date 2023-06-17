<?php 
require_once(__ROOT__ . '/Entity/size.php');
class Gestionsize {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($size){
        $name = $size->getName();
        $query = "INSERT INTO size(`name_size`) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT id_size, name_size FROM size';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $size_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $sizes = array();
        foreach ($size_data as $size_data) {
            $size = new Size();
            $size->setId($size_data['id_size']);
            $size->setName($size_data['name_size']);
            array_push($sizes, $size);
        }
        return $sizes;
    }
    public function Delete($id){
        $sql = "DELETE FROM size WHERE id_size = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function Modifier($id, $name)
    {
    $sql = "UPDATE size SET 
        name_size=:name
        WHERE id_size= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
