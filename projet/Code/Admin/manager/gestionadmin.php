<?php 
require_once(__ROOT__ . '/Entity/admin.php');
class Gestionadmin {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($admin){
        $name = $admin->getName();
        $query = "INSERT INTO categories(`name_admin`) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT id_admin, name_admin FROM categories';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $admin_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $admins = array();
        foreach ($admin_data as $admin_data) {
            $admin = new admin();
            $admin->setId($admin_data['id_admin']);
            $admin->setName($admin_data['name_admin']);
            array_push($admins, $admin);
        }
        return $admins;
    }
    public function Delete($id){
        $sql = "DELETE FROM categories WHERE id_admin = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function Modifier($id, $name)
    {
    $sql = "UPDATE categories SET 
        name_admin=:name
        WHERE id_admin= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
