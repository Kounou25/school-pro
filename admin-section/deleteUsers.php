<?php
include("../cn.php");
if (isset($_GET["Userid"])) {
   
    extract($_GET); 
    $userDelete = $cn->prepare("DELETE  FROM users WHERE idUsers=:idUsers");
    $userDelete->execute([
        "idUsers"=> $Userid
    ]);

    if ($userDelete) {
        header("Location:users.php?deleted=Utilisateur supprimer avec succes !");
    }
} 
