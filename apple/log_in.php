<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Page de connexion</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="log_in_php.css" />
	</head>
	
	<body>
		<p>
			<?php
				//log_in.php
				if (isset($_POST['pseudo']) AND isset($_POST['motdepasse']))
				{
					echo 'Bonjour '.htmlspecialchars($_POST['pseudo']).' content de vous revoir!'. '<br/><br/>';
					echo 'Bienvenue sur Apple Colored Design.';
				}
			?>
			<br/>
			<br/>
			<a href="pomme.html" class="action-button">Retour</a>
		</p>
	</body>
</html>