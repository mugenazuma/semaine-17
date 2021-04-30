<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail arcticle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase("localhost","root","","jarditou"); // Appel de la fonction de connexion
  

    $pro_id = $_GET["pro_id"];

    $requete = "SELECT pro_id,pro_ref,pro_libelle FROM produits join categories on cat_id = pro_cat_id where pro_id=" . $pro_id;
    $result = $db->query($requete);

    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
    //var_dump($produit); 
    ?>
   
</head>
<body>
<form class="was-validated" action="script_suppression.php" method="POST" name="Détail produit" id="Détail produit">
<h2 class="d-flex justify-content-center">Confirmation de la suppression du produit</h2>
<br>
<br>

<form name="Détail produit" id="Détail produit">
<div class="form-group">
        <div class="col-12 d-flex justify-content-center">
        <img src="jarditou/jarditou_photo/<?= $pro_id ?>" class="w-50" alt="jpg" title="<?= $pro_id . "." . $produit->pro_photo="jpg"; ?>"height= "400px" width="300px">.
        </div>

    
    <div class="form-group">
        
    <label for="pro_id">id :</label><input type="text" class="form-control" name="pro_id" id="pro_id" value="<?php echo $produit->pro_id ?>"Readonly>
    <label for="pro_ref">Référence :</label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref ?>" Readonly>
    <label for="pro_libelle">Libelle :</label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle"value="<?php echo $produit->pro_libelle ?>" Readonly>
    <br>
        <br>
<br>
<br>
<h3 class="d-flex justify-content-center">Voulez vous supprimer ce produit ?<h3>
        <br>
        <br>

        <div class="d-flex justify-content-center" name=actionProduit>
        <input type="button" name="Retour" value="Retour" onclick="self.location.href='tableaupdo.php'" style="background-color:blue" style="color:white; font-weight:bold"onclick>
        <button class="btn btn-warning" type="submit">Supprimer</button>
        </div>
        </div>
        <br>
        </form>
        </form>

    <!--fichiers Javascript nécessaires à Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>