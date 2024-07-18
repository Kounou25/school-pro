
<?php
// Inclusion du fichier de connexion à la base de données
include("cn.php");

// Vérification si le formulaire a été soumis
if (isset($_POST["Configurer"])) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $nom_admin = $_POST['nom_admin'];
    $prenom_admin = $_POST['prenom_admin'];
    $email_admin = $_POST['email_admin'];
    $password_admin = $_POST['password_admin'];
    $matricule = $_POST['matricule'];

    try {
        // Début de la transaction
        $cn->beginTransaction();

        // Insertion des données dans la table ETABLISSEMENT
        $setPlt = $cn->prepare("INSERT INTO ETABLISSEMENT (nom, adresse) VALUES (:nom, :adresse)");
        $setPlt->execute([
            "nom" => $nom,
            "adresse" => $adresse
        ]);

        // Insertion des données de l'administrateur dans la table USERS
        $role_admin = 0; // 0 pour admin
        $setAdmin = $cn->prepare("INSERT INTO USERS (nom, prenom, rolee, contact, matricule, mbp) VALUES (:nom, :prenom, :rolee, :contact, :matricule, :mbp)");
        $setAdmin->execute([
            "nom" => $nom_admin,
            "prenom" => $prenom_admin,
            "rolee" => $role_admin,
            "contact" => $email_admin,
            "matricule" => $matricule,
            "mbp" => $password_admin
        ]);

        // Mise à jour de l'état de la plateforme à 'configure'
        $stmt = $cn->prepare("UPDATE PLATEFORME SET etat = 'configure' WHERE idPlateforme = 1");
        $stmt->execute();

        // Validation de la transaction
        $cn->commit();

        if ($setAdmin) {
            // Redirection vers la page de connexion après la configuration
        header("location:login.php");
        exit();
        }
         // Assure la fin de l'exécution du script après la redirection

    } catch (Exception $e) {
        // Annulation de la transaction en cas d'erreur
        $cn->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}
?>
