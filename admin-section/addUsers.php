<?php
include("../cn.php");

extract($_POST);
if (isset($_POST["ajouterUser"])) {
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $addUser=$cn->prepare("INSERT INTO users (nom,prenom,rolee,contact,matricule,mbp) 
    VALUES(?,?,?,?,?,?)");
    $addUser->execute([ $nom, $prenom,$role,$contact,$matricule,$password]);

    if ($addUser) {
        echo $hashedPassword;
        
        header("Location:users.php?added=Utilisateur ajouter avec succes !");
    }
}