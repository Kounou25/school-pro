<?php 
	include("../cn.php");
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
    <link rel="stylesheet" href="teachers.css">

	<title>URBAN SCHOOL MANAGER</title>
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
			<a href="#" class="nav-link">Categories</a>
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
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Télécharger en PDF</span>
				</a>
			</div>

           
             <div class="container mt-4">
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addTeacher">Ajouter un enseignant</button>
                <?php 
			 	if (isset($_GET["teacherAdded"])) {
					?>
					<div class="alert alert-success"><?=$_GET["teacherAdded"]?></div>
				<?php
				}
                ?>
                <table class="table table-bordered">
					<thead class="thead-light">
						<tr>
							<th>id</th>
							<th>Matricule</th>
							<th>nom</th>
							<th>prenom</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php 
					//Affichage des différents utilisateurs presents dans la base des données
					$displayProf=$cn->query("SELECT idProf,matricule,nom,prenom from prof");
					while ($profResult=$displayProf->fetch(PDO::FETCH_OBJ)) {
						?>

					
					<tbody>
						<tr>
							<td><?=$profResult->idProf?></td>
							<td><?=$profResult->matricule?></td>
                            <td><?=$profResult->nom?></td>
                            <td><?=$profResult->prenom?></td>
							
                    
							
							<td>
								<div class="action-buttons">
									<a href="see-more.php?idProf=<?=$profResult->idProf?>"><button class="btn btn-primary btn-sm">voir</button></a>
									<button class="btn btn-warning btn-sm">modifier</button>
									
									<a href="deleteUsers.php?niveauId=<?=$profResult->idProf?>"><button class="btn btn-danger btn-sm">Supprimer</button></a>
									
									
									
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
            
            <!-- Modal pour ajouter un enseignant -->
            <div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="addTeacher" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTeacherModalLabel">Ajouter un enseignant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addTeacherForm" action="levelProcessing.php" method="POST">
							
							<div class="form-group">
                                    <label for="teacherMat">Matricule</label>
                                    <input type="text" name="teacherMat" class="form-control" id="teacherMat" required>
                                </div>    
							
							<div class="form-group">
                                    <label for="teacherName">Nom</label>
                                    <input type="text" name="teacherName" class="form-control" id="teacherName" required>
                                </div>
                                <div class="form-group">
                                    <label for="teacherSurname">Prénom</label>
                                    <input type="text" name="teacherSurname" class="form-control" id="teacherSurname" required>
                                </div>
                                <div class="form-group">
                                    <label for="teacherEmail">Email</label>
                                    <input type="email" name="teacherEmail" class="form-control" id="teacherEmail" required>
                                </div>
								<div class="form-group">
                                    <label for="teacherAdresse">Adresse</label>
                                    <input type="text" name="teacherAdresse" class="form-control" id="teacherAdresse" required>
                                </div>

								<div class="form-group">
                                    <label for="teacherPhone">Numéro de téléphone</label>
                                    <input type="phone" name="teacherPhone" class="form-control" id="teacherPhone" required>
                                </div>

								


					
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="addProf" class="btn btn-primary">Ajouter</button>
                        </div>
					</form>
                    </div>
				
                </div>
            </div>


            
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    

			
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