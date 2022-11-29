<?php
require_once("connexion.php");
$id_patient=isset($_GET['id_patient'])?$_GET['id_patient']:0;
$requete="delete from patient where id_patient='$id_patient'";
if($resultat = mysqli_query($con,$requete)){
    header("Location:index.php");
}else {
    echo "erreur";
}
?>