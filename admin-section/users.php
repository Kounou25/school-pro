<?php
include ("../cn.php");
session_start();
$school = $cn->query("select * from etablissement");
$result = $school->fetch(PDO::FETCH_OBJ);




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="users.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"><?=$result->nom?></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
			<li>
				<a href="users.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Utilisateurs</span>
				</a>
			</li>
			<li>
				<a href="teachers.php">
					<i class='bx bxs-graduation' ></i>
					<span class="text">Enseignants</span>
				</a>
			</li>
			<li>
				<a href="student.php">
					<i class='bx bxs-book-reader' ></i>
					<span class="text">Eleves</span>
				</a>
			</li>
			

			<li>
				<a href="levels.php">
					<i class='bx bxs-book-alt' ></i>
					<span class="text">Niveaux & sections</span>
				</a>
			</li>

			<li>
				<a href="classes.php">
					<i class='bx bxs-school' ></i>
					<span class="text">classes</span>
				</a>
			</li>

			<li>
				<a href="matiere.php">
					<i class='bx bxs-book-content' ></i>
					<span class="text">matiere</span>
				</a>
			</li>

			<li>
				<a href="chat.php">
					<i class='bx bxs-chat' ></i>
					<span class="text">messaggerie</span>
				</a>
			</li>


		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">paramètres</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Deconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="nav-link"><?=$_SESSION['name']?></a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">utilisateurs</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Télécharger en PDF</span>
				</a>
			</div>

			 <!-- ajouter tableau ici -->
			  
			  <?php 
			 	if (isset($_GET["added"])) {
					?>
					<div class="alert alert-success"><?=$_GET["added"]?></div>
				<?php
				}
				
				elseif (isset($_GET["deleted"])) {
					?>
					<div class="alert alert-success"><?=$_GET["deleted"]?></div>

			<?php
				}
			  ?>
             <div class="container mt-4">
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addUserModal">Ajouter un utilisateur</button>
                <table class="table table-bordered">
					<thead class="thead-light">
						<tr>
							<th>Id</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php 
					//Affichage des différents utilisateurs presents dans la base des données
					$UserDisplay=$cn->query("select * from users order by idUsers desc");
					while ($DisplayResult=$UserDisplay->fetch(PDO::FETCH_OBJ)) {
						?>

					
					<tbody>
						<tr>
							<td><?=$DisplayResult->idUsers?></td>
							<td><?=$DisplayResult->nom?></td>
							<td><?=$DisplayResult->prenom?></td>
							<td><?=$DisplayResult->contact?></td>
							<td><?=$DisplayResult->rolee?></td>
							<td>
								<div class="action-buttons">
									<button class="btn btn-warning btn-sm">modifier</button>
									<a href="deleteUsers.php?Userid=<?=$DisplayResult->idUsers?> "><button class="btn btn-danger btn-sm">Supprimer</button></a>
									
									
									
								</div>
							</td>
						</tr>
						<!-- Ajoutez d'autres lignes ici -->
					</tbody>
					<?php
				}
				?>
				</table>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Modal d'ajout d'utilisateur -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addUsers.php" method="POST">
                    <div class="form-group">
                        <label for="matricule">Matricule</label>
                        <input type="text" name="matricule" class="form-control" id="matricule">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom">
                    </div>
                    <div class="form-group">
                        <label for="contact">email</label>
                        <input type="email" name="contact" class="form-control" id="contact">
                    </div>
                   
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select class="form-control" name="role" id="role">
                            <option value="0">Administrateur</option>
                            <option value="1">Utilisateur</option>
                            <option value="2" >Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div> 
					<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button  class="btn btn-primary" name="ajouterUser">Ajouter</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>
</div>

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</body>
</html>