
<?php
// Connexion à la base de données
try
{
	require 'db.php';
	$bdd = $pdo;
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$heure = date('j/m/y, H:i');
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, heure) VALUES(?, ?, ?)');
$req->execute(array(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['message']), $heure));

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
