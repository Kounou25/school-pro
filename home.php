<?php
session_start();
if (empty($_SESSION['cmp'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-default,
        .btn-primary,
        .btn-danger,
        .btn-warning {
            border-radius: 20px;
            background-color: #667eea;
            color: #fff;
        }

        .btn-default:hover,
        .btn-primary:hover,
        .btn-danger:hover,
        .btn-warning:hover {
            background-color: #5a67d8;
            color: #fff;
        }

        .container {
            padding-top: 2rem;
        }

        .card {
            padding: 2rem;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand h4 {
            display: inline-block;
            margin-left: 10px;
            vertical-align: middle;
        }

        .list-group-item {
            background-color: #667eea;
            color: white;
        }

        .list-group-item.active {
            background-color: #5a67d8;
            color: white;
        }

        .table thead th {
            background-color: #5a67d8;
            color: white;
        }

        .table tbody tr {
            background-color: #ffffff;
            color: #333;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="envoi.jpg" alt="Photo de profil" class="rounded-circle" style="width: 60px; height: 60px;">
                <h3>Aissata Express</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" style="margin-right: 80px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="margin-right: 35px;"><span
                                class="glyphicon glyphicon-eye-open" style="color: black;"></span> Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="margin-right: 35px;"><span
                                class="glyphicon glyphicon-stats"></span> Colis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="margin-right: 35px;"><span
                                class="glyphicon glyphicon-link"></span> Profil Utilisateur</a>
                    </li>
                    <li>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search for..."
                                aria-label="Search">
                            <button class="btn btn-default my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        <div class="card mt-4">
            <h3 class="card-title text-center">Bienvenue sur la page d'accueil</h3>
            <p class="card-text text-center">Utilisez le menu pour naviguer entre les différentes pages.</p>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#envoyerColis">Envoyer un colis</button>
            <br>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#rechercheColis">Rechercher un colis</button>
        </div>
    </div>

    <div class="text-center mt-4">
    <img src="envoi.jpg" alt="Logo" style="width: 150px; height: 150px; border-radius: 50%;">
</div>


    <!-- Pied de page -->
    <footer class="text-center mt-5">
        <div class="container text-white">
            <h4 class="font-weight-bold" style="font-size: 24px;">Express Cargo Services</h4>
            <p style="font-size: 18px;">Votre partenaire de confiance pour l'envoi rapide et sécurisé de vos colis à travers le monde</p>
        </div>
    </footer>

    <!-- Modale pour l'envoi de colis -->
    <!-- Modale EnvoyerColis -->
<div class="modal fade" tabindex="-1" role="dialog" id="envoyerColis" aria-hidden="true" aria-labelledby="envoiColisLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="envoiColisLabel">Envoyer un Colis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour envoyer un colis -->
                <form action="envoi_colis.php" method="POST">
                    <!-- Expéditeur -->
                    <div class="form-group">
                        <label for="nomExp">Nom de l'expéditeur:</label>
                        <input type="text" name="nomExp" class="form-control" required placeholder="Nom de l'expéditeur">
                    </div>
                    <div class="form-group">
                        <label for="nomExp">Prenom de l'expéditeur:</label>
                        <input type="text" name="preExp" class="form-control" required placeholder="Nom de l'expéditeur">
                    </div>
                    <div class="form-group">
                        <label for="numExp">Numéro de l'expéditeur:</label>
                        <input type="text" name="numExp" class="form-control" required placeholder="Numéro de l'expéditeur">
                    </div>
                    <!-- Destinataire -->
                    <div class="form-group">
                        <label for="nomDest">Nom du destinataire:</label>
                        <input type="text" name="nomDest" class="form-control" required placeholder="Nom du destinataire">
                    </div>
                    <div class="form-group">
                        <label for="nomExp">Prenom de l'expéditeur:</label>
                        <input type="text" name="preDest" class="form-control" required placeholder="Nom de l'expéditeur">
                    </div>
                    <div class="form-group">
                        <label for="numDest">Numéro du destinataire:</label>
                        <input type="text" name="numDest" class="form-control" required placeholder="Numéro du destinataire">
                    </div>
                    <!-- Détails du colis -->
                    <div class="form-group">
                        <label for="nomColis">Nom du colis:</label>
                        <input type="text" name="nomColis" class="form-control" required placeholder="Nom du colis">
                    </div>
                    <div class="form-group">
                        <label for="valeurColis">Valeur du colis:</label>
                        <input type="number" name="valeurColis" class="form-control" required placeholder="Valeur du colis (montant)">
                    </div>
                    <div class="form-group">
                        <label for="valeurColis">Frais d'envoi:</label>
                        <input type="number" name="frais" class="form-control" required placeholder="frais d'envoi du colis (montant)">
                    </div>
                    <div class="form-group">
                        <label for="destinationColis">Destination du colis:</label>
                        <input type="text" name="destinationColis" class="form-control" required placeholder="Destination du colis">
                    </div>
                    <button class="btn btn-primary btn-block" name="enregistrer" value="enregistrer"type="submit" >Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modale pour la recherche de colis -->
    <!-- Modale RechercheColis -->
<div class="modal fade" tabindex="-1" role="dialog" id="rechercheColis" aria-hidden="true" aria-labelledby="rechercheColisLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rechercheColisLabel">Rechercher un Colis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour rechercher un colis -->
                <form action="recherche_colis.php" method="POST">
                    <!-- Destinataire -->
                    <div class="form-group">
                        <label for="numDest">Numéro du destinataire:</label>
                        <input type="text" name="numDest" class="form-control" required placeholder="Numéro du destinataire">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Lien vers FontAwesome pour les icônes -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Lien vers le JavaScript de Bootstrap et ses dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
