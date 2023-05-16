<?php 
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/product.php');
class Gestionproduct {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='projet';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  

    public function Insert($product) {
        $id = $product->getId();
        $nom = $product->getName();
        $description = $product->getdescription();
        $prix = $product->getprice();
        $query = "INSERT INTO product (name_product, description, price, Id_category) VALUES (:nom, :description, :price, :idcategory)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $prix);
        $stmt->bindParam(':idcategory', $id);
        $stmt->execute();
    }
    public function Select($id) {
        $sql = 'SELECT Id_product, name_product, description,price FROM product WHERE Id_category='.$id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $products_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $products = array();
        foreach ($products_data as $product_data) {
            $product = new Product();
            $product->setId($product_data['Id_product']);
            $product->setName($product_data['name_product']);
            $product->setdescription($product_data['description']);
            $product->setprice($product_data['price']);
            array_push($products, $product);
        }
        return $products;
    }
    public function Delete($id){
        $sql = "DELETE FROM product WHERE Id_product= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
    }
//     public function RechercherParId($id){
//         $query = $this->db->prepare("SELECT * FROM products WHERE id = :id");
//         $query->bindParam(":id", $id, PDO::PARAM_INT);
//         $query->execute();
//         $product_data = $query->fetch(PDO::FETCH_ASSOC);
    
//         $product = new product();
//         $product->setId($product_data['id']);
//         $product->setNom($product_data['nom']);
//         $product->setdescription ($product_data['description']);
    
//         return $product;
//     }
    public function Modifier($id, $nom, $description,$price)
{
    // Requête SQL
    $sql = "UPDATE product SET 
        name_product=:nom, description=:description,price=:price
        WHERE Id_product= :id";

    // Préparation de la requête
    $stmt = $this->db->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':price', $price);


    // Exécution de la requête
    $stmt->execute();


}
public function search($name,$idprojet) {
    $sql = 'SELECT Id_product, name_product, description, price FROM product WHERE name_product LIKE :name AND Id_category=:idcategory';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
    $stmt->bindValue(':idcategory', $idprojet, PDO::PARAM_STR);

    $stmt->execute();
    $tache_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $products = array();
    foreach ($tache_data as $product_data) {
        $product = new Product();
        $product->setId($product_data['Id_product']);
        $product->setName($product_data['name_product']);
        $product->setdescription($product_data['description']);
        $product->setprice($product_data['price']);
        array_push($products, $product);
    }
    return $products;
}
public function selectWithPagination( $rows="*", $where=null, $perPage=1) {

}



}
?>
