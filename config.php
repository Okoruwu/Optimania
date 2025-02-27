<?php
date_default_timezone_set('America/Mazatlan');
setlocale(LC_ALL, 'es_MX');

include_once('include/Database.php');
define('SS_DB_NAME', 'arketll6_optimania');
define('SS_DB_USER', 'arketll6_optimania');
define('SS_DB_PASSWORD', '+BEIlAnCVwef');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);

?>