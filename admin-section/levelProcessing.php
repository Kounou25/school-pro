<?php
include("../cn.php");

if (isset($_POST["addSection"])) {
    extract($_POST);

    $addSection = $cn->prepare("INSERT INTO section (section) VALUES(?)");
    $addSection->execute([ $section]);
    if ($addSection) {
        header("Location:levels.php?sectionadded=section ajouter avec succes !");
    }
}else if (isset($_POST["addNiveau"])) {
    extract($_POST);

    $addNiveau = $cn->prepare("INSERT INTO niveau (niveau,prix,idSection) VALUES(?,?,?)");
    $addNiveau->execute([ $niveau,$prix,$idsection]);

    if ($addNiveau) {
        header("Location:levels.php?Niveauadded=niveau ajouter avec succes !");
    }
}

else if (isset($_POST["addClasse"])) {
    extract($_POST);

    $addClasses=$cn->prepare("INSERT INTO class(class_name,idNiv)VALUES(?,?)");
    $addClasses->execute([ $className,$idNiv]);

    if ($addClasses) {
        header("Location:classes.php?classAdded=classe ajouter avec succes !");
    }
}

else if (isset($_POST["addModul"])) {
    extract($_POST);

    $addClasses=$cn->prepare("INSERT INTO matiere(matiere,coef,nbHeures,idNiv,idProf)VALUES(?,?,?,?,?)");
    $addClasses->execute([ $matiere,$coeff,$nbheure,$idNiv,$idProf]);

    if ($addClasses) {
        header("Location:matiere.php?ModulAdded=matière ajouter avec succes !");
    }
}

else if (isset($_POST["addProf"])) {
    extract($_POST);
   
    $addProf = $cn->prepare("INSERT INTO prof(matricule,nom,prenom,email,adresse,telephone) 
    VALUES(?,?,?,?,?,?)");
    $addProf->execute([$teacherMat,$teacherName,$teacherSurname,$teacherEmail,$teacherAdresse,$teacherPhone]);
   

    



    if ($addProf) {
        header("Location:teachers.php?teacherAdded=professeur ajouter avec succes !");
    }
}