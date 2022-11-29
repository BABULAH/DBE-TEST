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
    <form action="insertion.php" method="post">
        <table>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom_patient"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text"  name="nom_patiemt"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age_patiemt"></td>
            </tr>
            <tr>
                <td>Sexe</td>
                <td><input type="text" name="sexe_patiemt"></td>
            </tr>
            <tr>
                <td>Medecin</td>

                <td>
                <select name="id_medecin">
                    <?php
                        require_once("connexion.php");
                        $req="SELECT * FROM medecin";
                        $result=mysqli_query($con,$req);
                        while($result=mysqli_fetch_row($result)){
                            echo"<option value='".[0]."'>$result[0]</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Insert"></td>
            </tr>
        </table>
    </form>
</body>
</html>