<?php 
require_once(__ROOT__ . '/Entity/product.php');
class Gestionproduct {  
    private $db;
    function __construct() {
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($product){
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $category = $product->getCategory();
        $query = "INSERT INTO products( `nom_product`, `description`, `price`,`id_category`) VALUES (:name,:description,:price,:category)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $lastindex=$this->db->lastInsertId();
        return  $lastindex;
    }
    public function selectWithPagination($column, $value, $perPage = 1) {
        // Prepare the WHERE clause
        $where = '';
        $params = array();
        if (!empty($column) && !empty($value)) {
            $where = "WHERE $column LIKE :value";
            $params[':value'] = "$value%";
        }
    
        // Get the total count
        $countQuery = "SELECT COUNT(*) as count FROM products $where";
        $countStmt = $this->db->prepare($countQuery);
        $countStmt->execute($params);
        $totalCount = $countStmt->fetch(PDO::FETCH_ASSOC)['count'];
    
        // Calculate pagination
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($currentPage - 1) * $perPage;
        $limit = $perPage;
    
        // Get the result data
        $query = "SELECT * FROM products $where LIMIT $limit OFFSET $offset";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $product_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Process the result
        $products = array();
        foreach ($product_data as $product_data) {
            $product = new Product();
            $product->setId($product_data['Id_product']);
            $product->setName($product_data['nom_product']);
            $product->setDescription($product_data['description']);
            $product->setPrice($product_data['price']);
            $product->setCategory($product_data['id_category']);
            array_push($products, $product);
        }
    
        // Calculate the total number of pages
        $totalPages = ceil($totalCount / $perPage);
    
        return array(
            'query'=>$query,
            'result' => $products,
            'currentPage' => $currentPage,
            'totalCount' => $totalCount,
            'totalPages' => $totalPages
        );
    }
    
    // public function Select() {
    //     $sql = 'SELECT Id_product, nom_product,description,price,Id_size,Id_color,id_category FROM products';
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute();
    //     $product_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //     $products = array();
    //     foreach ($product_data as $product_data) {
    //         $product = new product();
    //         $product->setId($product_data['Id_product']);
    //         $product->setName($product_data['nom_product']);
    //         $product->setDescription($product_data['description']);
    //         $product->setSize($product_data['Id_size']);
    //         $product->setPrice($product_data['price']);
    //         $product->setColor($product_data['Id_color']);
    //         $product->setCategory($product_data['id_category']);
    //         array_push($products, $product);
    //     }
    //     return $products;
    // }
    public function Delete($id){
        $sql = "DELETE FROM products WHERE Id_product = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function Modifier($id, $name,$description,$price, $category)
    {
    $sql = "UPDATE products SET 
        `nom_product`=:name,`description`=:description,`price`=:price,`id_category`=:category
        WHERE Id_product= :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}
?>
