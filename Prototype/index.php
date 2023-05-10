<?php
    include "gestionprojet.php";
    // Trouver tous les employés depuis la base de données 
    $gestionprojet = new Gestionprojet();
    $projects = $gestionprojet->Select();
    if(isset($_POST['id'])){
      $id = $_POST['id'] ;
      $gestionprojet->Delete($id);
      header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>GESTION DES Projets</h1>
    <div> 
            <a href="add.php">Ajouter projet</a>
    </div>
    <table >
        <thead>
          <tr>
            <th >Nom</th>
            <th >Description</th>
            <th >Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
              foreach($projects as $projet){
            ?>
            <tr>
                <td><?= $projet->getNom() ?></td>
                <td><?= $projet->getdescription() ?></td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $projet->getId() ?>">
                    <button type="submit">Supprime</button>
                  </form>
                    <a href="editer.php?id=<?php echo $projet->getId() ?>">Éditer</a>
                </td>
            </tr>
            <?php }?>

        </tbody>
      </table>
</body>
</html>