<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Page d'inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
		<link rel="stylesheet" href="sign_up_php.css" />
	</head>
	
	<body>
		<p>
			<?php
				if(isset($_POST['civilite']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pseudo'])  AND isset($_POST['email']) AND isset($_POST['mdp']) AND isset($_POST['confirmer_mdp']))
				{
					if( $_POST['mdp'] === $_POST['confirmer_mdp'])
					{
						$civilite = $_POST["civilite"];
						$nom = $_POST["nom"];
						$prenom = $_POST["prenom"];
						$pseudo = $_POST["pseudo"];
						
						// Calcule l'âge à partir d'une date de naissance jj/mm/aaaa
						$anniversaire = $_POST["anniversaire"];
						function Age($anniversaire)
						{
						$am = explode('-', $anniversaire);
						$an = explode('-', date('d-m-Y'));
						if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0]))) return $an[2] - $am[2];
						return $an[2] - $am[2] - 1;
						}
						$age = age($anniversaire);

					    $email = $_POST["email"];
					    $phone = $_POST['phone'];
					    
					    try{
					    	//connexion a la bdd
					    	$dbco = new PDO("mysql:host='localhost';dbname='pomme_bdd'",'root','root');
					    	$dbco -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					    	//insertion des donnees reçues
					    	$sth = $dbco->prepare( "INSERT INTO contact(civilite, nom, prenom, pseudo, age, email, phone) VALUES (:civilite, :nom, :prenom, :pseudo, :age, :email, :phone)" );
					    	$sth->bindParam(':civilite', $civilite);
					    	$sth->bindParam(':nom', $nom);
					    	$sth->bindParam(':prenom',$prenom);
					    	$sth->bindParam(':pseudo', $pseudo);
					    	$sth->bindParam(':age', $age);
					        $sth->bindParam(':email', $email);
					        $sth->bindParam(':phone', $phone);
					        $sth->execute();

					        //ce que l'on renvoie si c'est bon
			?>
					        <h1>Formulaire bien envoyé</h1>
							<p>Bonjour <?php htmlspecialchars($_POST['pseudo']) ?> et Bienvenue à toi sur le site du moment Pomme</p>
							<a href="pomme.html" class="action-button">Retour vers l'Acceuil</a>
			<?php
					    }
					    catch(PDOException $e)
					    {
       						echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    					}
					}
				}
			?>
			
		</p>
	</body>
</html>