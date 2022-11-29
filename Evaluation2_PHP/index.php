<?php
include_once("connexion.php");
$requetePatient="select id_patient,prenom_patient,nom_patiemt,age_patiemt, sexe_patiemt, prenom_medecin,nom_medecin,libelle_specialite
from patient inner join medecin on medecin.id_medecin = patient.id_medecin inner join specialite on medecin.id_specialite = specialite.id_specialite order by id_patient";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <a href="ajout.php"><button>Insert</button></a>
    <div class="content-table">
    <table border="5">
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Sexe</th>
                <th>Prenom medecin</th>
                <th>Nom medecin</th>
                <th>Specialite medecin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
    if($resultat = mysqli_query($con,$requetePatient)){
    while($patient = mysqli_fetch_row($resultat)){?>
            <tr>
             <td><?php echo $patient[1] ?></td>
             <td><?php echo $patient[2] ?></td>
             <td><?php echo $patient[3] ?></td>
             <td><?php echo $patient[4] ?></td>
             <td><?php echo $patient[5] ?></td>
             <td><?php echo $patient[6] ?></td>
             <td><?php echo $patient[7] ?></td>
             <td><a href="Edit.php?id_patient=<?= $patient[0] ?>"><button class="button-aff1">Edit<i class="fa-solid fa-pen-to-square"></i></button></a>
             &nbsp;
             <a onclick="return confirm('Voulez vous bien supprimer le patient numéro <?= $patient[0] ?> ')"
                                            href="Supprimer.php?id_patient=<?= $patient[0] ?>"><button class="button-aff2">Delete<i class="fa-solid fa-trash"></i></button>
                                            </a>
            </tr>
        </tbody>
      <?php }
    }
    ?>
    </table>
    </div>
</body>
</html>