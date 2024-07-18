
<?php 
include("../cn.php");
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
    <link rel="stylesheet" href="see-more.css">

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

            <div class="container mt-5">
                <h2>Fiche de renseignement du professeur</h2>
                <div class="teacher-info-card">
                    <div class="teacher-photo">
                        <img src="img/yo.jpg" alt="Photo du professeur">
                    </div>
					<?php 

					if (isset($_GET["idProf"])) {
						extract($_GET);
						$seeProf=$cn->prepare("SELECT idProf,matricule,nom,prenom,email,telephone,date_ajout,adresse,matiere,class_name FROM prof p, matiere m, class c WHERE p.idClass = c.idClass AND p.idMat=m.idMat AND idProf=:idProf");
						$seeProf->execute(["idProf"=> $idProf]);
						$seeProf_Result = $seeProf->fetch(PDO::FETCH_OBJ);
						
					
					?>
                    <div class="teacher-details">
                        <h3>Informations personnelles</h3>
                        <p><strong>Nom:</strong> <span id="teacher-name"><?=$seeProf_Result->nom?></span></p>
                        <p><strong>Prénom:</strong> <span id="teacher-surname"><?=$seeProf_Result->prenom?></span></p>
                        <p><strong>Email:</strong> <span id="teacher-email"><?=$seeProf_Result->email?></span></p>
                        <p><strong>Téléphone:</strong> <span id="teacher-phone"><?=$seeProf_Result->telephone?></span></p>
                        <p><strong>Adresse:</strong> <span id="teacher-address"><?=$seeProf_Result->adresse?></span></p>
            
                        <h3>Informations professionnelles</h3>
                        <p><strong>Discipline:</strong> <span id="teacher-discipline"><?=$seeProf_Result->matiere?></span></p>
                        <p><strong>classe:</strong> <span id="teacher-department"><?=$seeProf_Result->class_name?></span></p>
                        <p><strong>Date de recrutement:</strong> <span id="teacher-hire-date"><?=$seeProf_Result->nom?></span></p>
                        <p><strong>Numéro de matricule:</strong> <span id="teacher-id"><?=$seeProf_Result->matricule?></span></p>
                    </div>
					<?php 
					}
					?>
                </div>
            </div>
            
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</body>
</html>