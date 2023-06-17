<?php 
require_once(__ROOT__ . '/Entity/color.php');
class Gestioncolor {  
    private $db;
    function __construct() {
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($color){
        $name = $color->getName();
        $code = $color->getCode();
        $query = "INSERT INTO color(`name_color`,`code_color`) VALUES (:name,:code)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT id_color, name_color,code_color FROM color';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $color_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $colors = array();
        foreach ($color_data as $color_data) {
            $color = new color();
            $color->setId($color_data['id_color']);
            $color->setName($color_data['name_color']);
            $color->setCode($color_data['code_color']);
            array_push($colors, $color);
        }
        return $colors;
    }
    public function Delete($id){
        $sql = "DELETE FROM color WHERE id_color = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function Modifier($id, $name,$code)
    {
    $sql = "UPDATE color SET 
        name_color=:name ,code_color=:code
        WHERE id_color= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
