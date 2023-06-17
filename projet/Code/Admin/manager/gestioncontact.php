<?php 
require_once(__ROOT__ . '/Entity/contact.php');
class Gestioncontact {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='FILL-ROUGE';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    public function Insert($contact){
        $name = $contact->getName();
        $email = $contact->getEmail();
        $message = $contact->getMessage();

        $query = "INSERT INTO Contact(`Name`, `Email`, `Message`) VALUES (:name,:email,:message)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        $stmt->execute();
    }
    public function Select($where) {
        $sql = 'SELECT Id_message,`Name`, `Email`, `Message` FROM Contact';
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $contact_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $contacts = array();
        foreach ($contact_data as $contact_data) {
            $contact = new Contact();
            $contact->setId($contact_data['Id_message']);
            $contact->setName($contact_data['Name']);
            $contact->setEmail($contact_data['Email']);
            $contact->setMessage($contact_data['Message']);
            array_push($contacts, $contact);
        }
        return $contacts;
    }
    public function selectWithPagination($column, $value, $perPage = 1) {
        // Prepare the WHERE clause
        $where = '';
        $params = array();
        if (!empty($column) && !empty($value)) {
            $where = "WHERE $column = :value";
            $params[':value'] = $value;
        }
    
        // Get the total count
        $countQuery = "SELECT COUNT(*) as count FROM Contact $where";
        $countStmt = $this->db->prepare($countQuery);
        $countStmt->execute($params);
        $totalCount = $countStmt->fetch(PDO::FETCH_ASSOC)['count'];
    
        // Calculate pagination
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($currentPage - 1) * $perPage;
        $limit = $perPage;
    
        // Get the result data
        $query = "SELECT * FROM Contact $where LIMIT $limit OFFSET $offset";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $contacts_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Process the result
        $Contacts = array();
        foreach ($contacts_data as $contact_data) {
            $contact = new Contact();
            $contact->setId($contact_data['Id_message']);
            $contact->setName($contact_data['Name']);
            $contact->setEmail($contact_data['Email']);
            $contact->setMessage($contact_data['Message']);
            array_push($Contacts, $contact);
        }
    
        // Calculate the total number of pages
        $totalPages = ceil($totalCount / $perPage);
    
        return array(
            'query'=>$query,
            'result' => $Contacts,
            'currentPage' => $currentPage,
            'totalCount' => $totalCount,
            'totalPages' => $totalPages
        );
    }
}
?>
