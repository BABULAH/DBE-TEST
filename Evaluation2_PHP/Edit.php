<?php
require_once("connexion.php");
$id_patient=$_GET['id_patient'];
$requetePatient="select prenom_patient,nom_patiemt,age_patiemt,sexe_patiemt,id_medecin
from patient where id_patient=$id_patient";
$resultat = mysqli_query($con,$requetePatient);
$patient= mysqli_fetch_row($resultat);
$prenom_patient=$patient[0];
$nom_patiemt=$patient[1];
$age_patiemt=$patient[2];
$sexe_patiemt=$patient[3];
$id_medecin=$patient[4];

if (isset($_POST['submit'])) {
    $prenom_patient=mysqli_real_escape_string($con,$_POST['prenom_patient']);
    $nom_patiemt=mysqli_real_escape_string($con,$_POST['nom_patiemt']);
    $age_patiemt=mysqli_real_escape_string($con,$_POST['age_patiemt']);
    $sexe_patiemt=mysqli_real_escape_string($con,$_POST['sexe_patiemt']);
    $id_medecin=mysqli_real_escape_string($con,$_POST['id_medecin']);

    if (empty($prenom_patient) || empty($nom_patiemt) || empty($age_patiemt) || empty($sexe_patiemt) || empty($id_medecin)) {
        // if (empty($nom)) {
        //     echo "<font color='red'> Nom requis";
        // }
        // if (empty($prenom)) {
        //     echo "<font color='red'> Prenom requis";
        // }
        // if (empty($tel)) {
        //     echo "<font color='red'> Tel requis";
        // }
        echo "<font color='red'> Saisie imcomplete !";
        // echo '<a href="Edit.php"><button>Ressayer</button></a>';
    }
    else{
        mysqli_query($con,"UPDATE patient SET prenom_patient='$prenom_patient',nom_patiemt='$nom_patiemt',age_patiemt='$age_patiemt',sexe_patiemt='$sexe_patiemt',id_medecin='$id_medecin ' WHERE id_patient=$id_patient");

        header("Location:index.php");
   } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"><button>Home</button></a><br><br>
    <h2>modification pour : <?php echo $prenom_patient." ".$nom_patiemt?></h2>
    <form action="edit.php?id_patient=<?= $id_patient ?>" method="post">
        <table>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom_patient" value="<?= $prenom_patient?>"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text"  name="nom_patiemt" value="<?= $nom_patiemt?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age_patiemt" value="<?= $age_patiemt?>"></td>
            </tr>
            <tr>
                <td>Sexe</td>
                <td><input type="text" name="sexe_patiemt" value="<?= $age_patiemt?>"></td>
            </tr>
            <tr>
                <td>Medecin</td>
                <td><input type="number" name="id_medecin" value="<?= $id_medecin?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Insert"></td>
            </tr>
        </table>
    </form>
</body>
</html>