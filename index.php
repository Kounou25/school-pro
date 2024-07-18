<?php
include("cn.php");
try {
    // Vérification de l'état de la plateforme
    $stmt = $cn->query("SELECT etat FROM PLATEFORME");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result || $result['etat'] == 'non_configure') {
        // La plateforme n'est pas encore configurée, afficher le formulaire de configuration
?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Configurer la Plateforme</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
        <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                .container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 400px;
                    margin: auto;
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .form-group {
                    margin-bottom: 15px;
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                    font-weight: bold;
                }

                input[type="text"],
                input[type="email"],
                input[type="password"] {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                input[type="submit"].btn {
                    width: 100%;
                    padding: 10px;
                    background-color: #5cb85c;
                    border: none;
                    color: white;
                    font-weight: bold;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }

                input[type="submit"].btn:hover {
                    background-color: #4cae4c;
                }
            </style>
            <div class="container">
                <h2>Configuration de la Plateforme</h2>
                <form action="traitement_config.php" method="POST">
        <label for="nom">Nom de l'établissement :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse"><br><br>

        <label for="matricule_admin">Matricule de l'administrateur :</label>
        <input type="text" id="matricule" name="matricule" required><br><br>
        
        <label for="nom_admin">Nom de l'administrateur :</label>
        <input type="text" id="nom_admin" name="nom_admin" required><br><br>
        
        <label for="prenom_admin">Prénom de l'administrateur :</label>
        <input type="text" id="prenom_admin" name="prenom_admin" required><br><br>
        
        <label for="email_admin">Email de l'administrateur :</label>
        <input type="email" id="email_admin" name="email_admin" required><br><br>
        
        <label for="password_admin">Mot de passe de l'administrateur :</label>
        <input type="password" id="password_admin" name="password_admin" required><br><br>
        
        <input type="submit" name="Configurer" value="Configurer" class="btn">
    </form>
            </div>
        </body>
        </html>
<?php
    } else {
        // La plateforme est déjà configurée, rediriger vers la page de connexion
        header("Location: login.php");
        exit();
    }
}
catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
$conn = null;
?>
