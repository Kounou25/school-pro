<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Authentification</title>
    <!-- Lien vers le CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers le CSS de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-card {
            padding: 2rem;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }
        .login-card img {
            display: block;
            margin: 0 auto 1.5rem;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .login-card h3 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #333;
            text-align: center;
        }
        .login-card .form-label {
            font-weight: 500;
            color: #333;
        }
        .login-card .form-control {
            border-radius: 30px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .login-card .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .login-card .form-group {
            margin-bottom: 1.5rem;
        }
        .login-card button {
            border-radius: 30px;
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
            background: #667eea;
            border: none;
            transition: background 0.3s ease;
            width: 100%;
            color: #fff;
        }
        .login-card button:hover {
            background: #5a67d8;
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
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <img src="1.png">
        <h2 class="mt-5">Connexion</h2>
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] == 1) {?>
            <div class="alert alert-danger" >Matricule ou mot de passe incorrect !</div>
            
        <?php
        }
        ?>
        <form class="form-horizontal" role="form" method="POST" action="connexion.php">
            <div class="form-group">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="matricule" placeholder="Entrez votre matricule" name="matricule" required>
            </div>
            <div class="form-group">
                <label for="mbp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mbp" placeholder="Entrez votre mot de passe" name="mbp" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="access" value="1">Se connecter</button>
            </div>
        </form>
    </div>
            </div>
        </div>
    </div>
    
    <!-- Lien vers le JavaScript de Bootstrap et ses dépendances -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
