<?php 
	session_start();
    include("../cn.php");
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
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addStudents"> Nouvelle inscription</button>
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
            
            <!-- Modal pour ajouter un élève -->
<div class="modal fade" id="addStudents" tabindex="-1" role="dialog" aria-labelledby="addStudents" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Ajouter un élève</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addStudentForm" action="studentProcessing.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="studentMat">Matricule</label>
                        <input type="text" name="studentMat" class="form-control" id="studentMat" required>
                    </div>

                    <div class="form-group">
                        <label for="studentName">Nom</label>
                        <input type="text" name="studentName" class="form-control" id="studentName" required>
                    </div>

                    <div class="form-group">
                        <label for="studentSurname">Prénom</label>
                        <input type="text" name="studentSurname" class="form-control" id="studentSurname" required>
                    </div>

                    <div class="form-group">
                        <label for="studentDOB">Date de Naissance</label>
                        <input type="date" name="studentDOB" class="form-control" id="studentDOB" required>
                    </div>

                    <div class="form-group">
                        <label for="studentPOB">Lieu de Naissance</label>
                        <input type="text" name="studentPOB" class="form-control" id="studentPOB" required>
                    </div>

                    <div class="form-group">
                        <label for="studentGender">Genre</label>
                        <select name="studentGender" class="form-control" id="studentGender" required>
                            <option value="male">Masculin</option>
                            <option value="female">Féminin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="studentNationality">Nationalité</label>
                        <input type="text" name="studentNationality" class="form-control" id="studentNationality" required>
                    </div>

                    <div class="form-group">
                        <label for="studentClass">Classe</label>
                        <input type="text" name="studentClass" class="form-control" id="studentClass" required>
                    </div>

                    <div class="form-group">
                        <label for="studentAddress">Adresse</label>
                        <input type="text" name="studentAddress" class="form-control" id="studentAddress" required>
                    </div>

                    <div class="form-group">
                        <label for="firstPaymentAmount">Montant Premier Versement</label>
                        <input type="number" name="firstPaymentAmount" class="form-control" id="firstPaymentAmount" required>
                    </div>

                    <div class="form-group">
                        <label for="studentPhone">Numéro de Téléphone</label>
                        <input type="tel" name="studentPhone" class="form-control" id="studentPhone" required>
                    </div>

                    <div class="form-group">
                        <label for="studentPhoto">Photo</label>
                        <input type="file" name="studentPhoto" class="form-control-file" id="studentPhoto" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="guardianName">Nom du Tuteur</label>
                        <input type="text" name="guardianName" class="form-control" id="guardianName" required>
                    </div>

                    <div class="form-group">
                        <label for="guardianPhone">Numéro du Tuteur</label>
                        <input type="tel" name="guardianPhone" class="form-control" id="guardianPhone" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="addStudent" class="btn btn-primary">Ajouter</button>
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