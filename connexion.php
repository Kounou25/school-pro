<?php 
require_once("cn.php");
session_start();

if (isset($_POST['access']) && $_POST['access'] == '1') {
    $matricule = $_POST['matricule'];
    $mbp = $_POST['mbp'];

    // Préparer et exécuter la requête pour récupérer les informations de l'utilisateur
    $v = $cn->prepare("SELECT prenom, matricule, mbp FROM USERS WHERE matricule = ?");
    $v->execute([$matricule]);
    $tabv = $v->fetch();

    if ($tabv && $tabv['mbp'] == $mbp) {
        $_SESSION['cmp'] = $matricule;
        $_SESSION['name'] = $tabv['prenom'];
        header("Location: admin-section/index.php");
        exit();
    } else {
        header("Location: login.php?msg=1");
        exit();
    }
}
?>
