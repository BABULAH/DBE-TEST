<?php
   
    $host = "localhost";
    $user = "root";
    $password = "";
    $base = "hopital";
    $con=mysqli_connect($host,$user,$password,$base) 
    or die('Erreur de connexion'.mysqli_connect_errno($con));
        echo"connexion réussie";
?>