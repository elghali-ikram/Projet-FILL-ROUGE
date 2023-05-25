<?php
    include "./manager/gestioncategory.php";
    $gestioncategory = new Gestioncategory();
    $categorys = $gestioncategory->Select();
    if($_POST['supprime']){
      $id = $_POST['id'] ;
      $gestioncategory->Delete($id);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="UI/style.css">
</head>
<body>
    <h1>CATEGORY</h1>
    <div> 
            <a href="UI/add.php">Ajouter category</a>
    </div>
    <table >
        <thead>
          <tr>
            <th >Nom</th>
            <th >Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
              foreach($categorys as $category){
            ?>
            <tr>
                <td><?= $category->getName() ?></td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $category->getId() ?>">
                    <input type="submit" value="Supprime" name="supprime">
                  </form>
                    <a href="UI/editer.php?id=<?php echo $category->getId() ?>">Éditer</a>
                </td>
            </tr>
            <?php }?>

        </tbody>
      </table>
</body>
</html>