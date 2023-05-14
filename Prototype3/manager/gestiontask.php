<?php 
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/task.php');
class GestionTasks {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='prototype';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   

    public function Insert($task) {
        $id = $task->getId();
        $nom = $task->getNom();
        $description = $task->getdescription();
        $query = "INSERT INTO tache (nom, description,idprojet) VALUES (:nom, :description,:idtask)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':idtask', $id);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
    public function Select($id) {
        $sql = 'SELECT id, nom, description FROM tache WHERE idprojet='.$id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $tache_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $tasks = array();
        foreach ($tache_data as $task_data) {
            $task = new task();
            $task->setId($task_data['id']);
            $task->setNom($task_data['nom']);
            $task->setdescription($task_data['description']);
            array_push($tasks, $task);
        }
        return $tasks;
    }
    public function Delete($id){
        $sql = "DELETE FROM tache WHERE id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
    }
    public function RechercherParId($id){
        $query = $this->db->prepare("SELECT * FROM tache WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $task_data = $query->fetch(PDO::FETCH_ASSOC);
    
        $task = new task();
        $task->setId($task_data['id']);
        $task->setNom($task_data['nom']);
        $task->setdescription ($task_data['description']);
    
        return $task;
    }
    public function Modifier($id, $nom, $description)
{
    // Requête SQL
    $sql = "UPDATE tache SET 
        nom=:nom, description=:description
        WHERE id= :id";

    // Préparation de la requête
    $stmt = $this->db->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);

    // Exécution de la requête
    $stmt->execute();


}
public function search($name,$idprojet) {
    $sql = 'SELECT id, nom, description FROM tache WHERE nom LIKE :name AND idprojet=:idprojet';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
    $stmt->bindValue(':idprojet', $idprojet, PDO::PARAM_STR);

    $stmt->execute();
    $tache_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tasks = array();
    foreach ($tache_data as $task_data) {
        $task = new Task();
        $task->setId($task_data['id']);
        $task->setNom($task_data['nom']);
        $task->setdescription($task_data['description']);
        array_push($tasks, $task);
    }
    return $tasks;
}
public function selectWithPagination( $rows="*", $where=null, $perPage=1) {

}



}
?>
