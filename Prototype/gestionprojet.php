<?php 
class Gestionprojet {  
    private $db;
    function __construct() { 
        $DB_HOST='localhost';  
        $DB_USER='root';  
        $DB_PASSWORD='';  
        $DB_DATABSE='prototype';   
        $this->db = new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}", $DB_USER, $DB_PASSWORD); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  

    public function Insert($projet) {
        $nom = $projet->getNom();
        $description = $projet->getdescription();
        $query = "INSERT INTO Projet(nom, description) VALUES (:nom, :description)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
    public function Select() {
        $sql = 'SELECT id, nom, description FROM Projet';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $projet_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $projets = array();
        foreach ($projet_data as $project_data) {
            $project = new Projet();
            $project->setId($project_data['id']);
            $project->setNom($project_data['nom']);
            $project->setdescription($project_data['description']);
            array_push($projets, $project);
        }
        return $projets;
    }
    public function Delete($id){
        $sql = "DELETE FROM Projet WHERE Id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
    }
    public function RechercherParId($id){
        $query = $this->db->prepare("SELECT * FROM Projet WHERE Id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $projet_data = $query->fetch(PDO::FETCH_ASSOC);
    
        $projet = new Projet();
        $projet->setId($projet_data['id']);
        $projet->setNom($projet_data['nom']);
        $projet->setdescription ($projet_data['description']);
    
        return $projet;
    }
    public function Modifier($id, $nom, $description)
{
    // Requête SQL
    $sql = "UPDATE Projet SET 
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



}
class Projet{
    private $Id;
    private $Nom;
    private $description;
    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }
    public function getNom() {
        return $this->Nom;
    }
    public function setNom($nom) {
        $this->Nom = $nom;
    }

    public function getdescription() {
        return $this->description;
    }
    public function setdescription($description) {
        $this->description = $description;
    }
}
?>
