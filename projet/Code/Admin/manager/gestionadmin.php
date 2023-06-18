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
        $email=$admin->getEmail();
        $password=$admin->getPassword();
        $pass=password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO Admin( `name`, `email`, `password`) VALUES (:name,:email,:password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
    }
    public function signin($email, $password)
    {
        session_start();
        try {
            $sql = "SELECT * FROM `Admin` WHERE `email`= ?";
            $query = $this->db->prepare( $sql );
            $query->execute( array($email));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            if($results)
            {
                if(password_verify($password,$results[0]["password"]))
                {
                    $_SESSION["email"]=$results[0]["email"];
                    $_SESSION["id"]=$results[0]["id_admin"];
                    $_SESSION["name"]=$results[0]["name"];


                    return true;
                }
            }
            else{
                return false;
            }
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
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
    public function Modifier($id, $name,$email,$password)
    {
        $pass=password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `Admin` SET 
        `name`=:name,`email`=:email,`password`=:password
        WHERE id_admin= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $pass);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
