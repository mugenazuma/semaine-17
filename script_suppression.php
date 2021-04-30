
<?php
// var_dump($_POST);
// Récupération des données du formulaires

var_dump($_POST);

$id= $_POST['pro_id'];
$reference = $_POST['pro_ref'];
$libelle = $_POST['pro_libelle'];


var_dump($id);
var_dump($reference);
var_dump($libelle);


   // Preparation de la connexion BDD.
   require "connexion_bdd.php";
    $db = connexionBase("localhost","root","","jarditou");
    

 // Préparation de la requete de suppression.
 $requete = $db->prepare(
"DELETE FROM produits
WHERE pro_id= :id
and pro_ref= :reference
and pro_libelle= :libelle"
);


 $requete->bindValue(":id",$id);
 $requete->bindValue(":reference",$reference);
 $requete->bindValue(":libelle",$libelle);


 // Execution de la requête
 $Supprimer = $requete->execute();
 
if ($Supprimer == true) {
   header("Location:tableaupdo.php?delete=success");
}
else {
   header("Location:detailexo4.php?pro_id=".$id."&delete=error");
}


?>






