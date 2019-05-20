
<?php 

require 'config.php';

//connexion au mysql avec invocation d'un pilote
$dsn = 'mysql:dbname='.$name.';host='.$host.';charset=UTF8';

try {
	$pdo = new PDO($dsn, $user , $pass);

} catch (PDOException $e){
	echo 'Connexion échouée : '. $e->getMessage();
}

?>