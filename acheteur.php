<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Page_acheteur</title>
	<link rel="stylesheet" type="text/css" href="css/style_acheteur.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/side_menu.css">
	<link rel="stylesheet" href="css/footer.css">
</head>
<body>
	<?php include 'header.php'; ?>

	<div id="side_menu">
		<div id="champinion" class="categorie">
			<button type="submit">champignon</button>
		</div>
		<div id="Figurine" class="categorie">
			<button type="submit">Figurine</button>
		</div>
		<div id="Jeux" class="categorie">
			<button type="submit">Jeux</button>
		</div>
		<div id="shimmer" class="categorie">
			<button type="submit">shimmer</button>
		</div>
	</div>

	<div class="carre"></div>

	<p class="para_particulier"> Informations de l'utilisateur </p>

	<p class="para_particulier">-identifiant/adresse mail/téléphone</p>

	<p class="para_particulier">-nom de l'entrerpise ou statut particulier</p>

	<div class="input-container-form">
		<div class=pani>
			<button type="button" class="style_butt">
				<a href=Panier.html>Panier</a>
			</button>
		</div>
	</div>

	<div class="input-container-form">
		<div class="s_abon">
			<button type="text" class="style_butt">S'abonner</button>
		</div>
	</div>

	<div class="input-container-form">
		<div class="comm">
			<button type="button" class="style_butt">
				<a href=Commandes.html>Commande</a>
			</button>
		</div>
	</div>

	<div class="input-container-form">
		<div class="complet">
			<button type="text" class="Completer_des_informations">Compléter des informations</button>
		</div>
	</div>

	<p>Prenom: <?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '' ?></p>
	<p>Nom: <?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : '' ?></p>
	<p>Email: <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?></p>
	<p>Identifiant: <?php echo isset($_SESSION['identifiant']) ? $_SESSION['identifiant'] : '' ?></p>
	<p>Mot de passe: <?php echo isset($_SESSION['mot_de_passe']) ? $_SESSION['mot_de_passe'] : '' ?></p>

	<?php include 'footer.php'; ?>
</body>
</html>
