<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
    require ("connexion_bdd.php"); // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase("localhost","root","","jarditou"); // Appel de la fonction de connexion
    ?>
</head>
<body>

<?
$Pdo_Object = new PDO("mysql:host=127.0.0.1;dbname=DataBase","user","password",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 

try{ 
    $id = Clear_Front_Variable($_GET['pro_id']);
    $Allow = Valid_id_($id);
 
    if(!$Allow) throw new Exception("ce n'est pas un id");
 
    $Arr_Key_Value = array('target_pro_id' => $id);
    $Sql_Query = "SELECT pro_id,pro_ref,pro_cat_id,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_bloque,pro_d_ajout FROM produit WHERE pro_id=:target_pro_id";
 
    $Request= $Pdo_Object->prepare($Sql_Query);
 
    $Request->execute($Arr_Key_Value);
 
    $Datatable = $Request->fetchAll();
 }
 catch(PDOException $pdo_e){
   //afficher message d'erreur PDO
 }
 catch(Exception $e){
   //afficher message d'erreur 
 }
?>

 <!--fichiers Javascript nécessaires à Bootstrap-->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>