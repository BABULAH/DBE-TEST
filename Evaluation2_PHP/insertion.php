<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("connexion.php"); 
        if (isset($_POST['submit'])) {
            $prenom_patient=mysqli_real_escape_string($con,$_POST['prenom_patient']);
            $nom_patiemt=mysqli_real_escape_string($con,$_POST['nom_patiemt']);
            $age_patiemt=mysqli_real_escape_string($con,$_POST['age_patiemt']);
            $sexe_patiemt=mysqli_real_escape_string($con,$_POST['sexe_patiemt']);
            $id_medecin=mysqli_real_escape_string($con,$_POST['id_medecin']);

            if (empty($prenom_patient) || empty($nom_patiemt) || empty($age_patiemt) || empty($sexe_patiemt) || empty($id_medecin)) {
             
                echo "<font color='red'> Erreur de saisie !";
            }
            else {
                $req="insert into patient(prenom_patient, nom_patiemt, age_patiemt,sexe_patiemt,id_medecin) values('$prenom_patient','$nom_patiemt','$age_patiemt','$sexe_patiemt','$id_medecin') ";
                
                $result=mysqli_query($con,$req);
    
                echo "<font color='green'> insertion reussi !";
                echo "<a href='index.php'><button>Liste Apps</button></a>";
            }
        }
       
    ?>
</body>
</html>