<?php 
require_once(__ROOT__ . '/Entity/image.php');
class Gestionimage {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($image){
        $name = $image->getName();
        $idproduct = $image->getProduct();
        $query = "INSERT INTO images(`url_image`,`Id_product`) VALUES (:name,:product_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':product_id', $idproduct);
        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT id_image, url_image,Id_product FROM images';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $image_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $images = array();
        foreach ($image_data as $image_data) {
            $image = new image();
            $image->setId($image_data['id_image']);
            $image->setName($image_data['url_image']);
            $image->setProduct($image_data['Id_product']);
            array_push($images, $image);
        }
        return $images;
    }
    public function Delete($id){
        $sql = "DELETE FROM images WHERE Id_product = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    // public function Modifier($id, $name,$code)
    // {
    // $sql = "UPDATE image SET 
    //     name_image=:name ,code_image=:code
    //     WHERE id_image= :id";
    // $stmt = $this->db->prepare($sql);
    // $stmt->bindParam(':name', $name);
    // $stmt->bindParam(':code', $code);
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();
    // }
}
?>
