
<!DOCTYPE html>
<html>
<head>
	<title>Miaou PHP</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<form action="ajout.php" method="post">
		<p>
		<label for="pseudo">Pseudo :</label>  
		<input type="text" name="pseudo" id="pseudo" required /><br />
		<label for="message">Message :</label>   
		<input type="textarea" name="message" id="message" /><br />
		<input type="submit" value="Envoyer" />
		</p>
    </form>
	<!--button id="refresh" onclick="document.location.reload(false)"> Rafraichir </button-->
	<div class="chatbox">
		<?php
		// Connexion à la base de données
		try
		{
			require "db.php";
			$bdd = $pdo;
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		// Récupération des 10 derniers messages par ordre décroissant
		$reponse = $bdd->query('SELECT pseudo, message, heure FROM minichat ORDER BY id DESC LIMIT 15');

		// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
		while ($donnees = $reponse->fetch())
		{
			if($donnees["pseudo"]!==""){
				echo '<div><p><strong>'.htmlspecialchars($donnees['pseudo']).'</strong> ('.$donnees['heure'].'): '.htmlspecialchars($donnees['message']).'</p></div>';
			}
		}

		$reponse->closeCursor(); 
		//Ferme le curseur, permettant à la requête d'être de nouveau exécutée
		?>
	</div>
</body>
</html>