<?Php
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
define('DBUSER','u521551065_admin');
define('DBPWD','Jol@n520');
define('DBHOST','localhost');
define('DBNAME','u521551065_knowgod');

$dbhost_name = "localhost";
$database = "u521551065_knowgod"; // Change your database name
$username = "u521551065_admin";          // Your database user id
$password = "Jol@n520";          // Your password

//////// Do not Edit below /////////
try {
$dbo=new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$conn = mysqli_connect($dbhost_name, $username, $password, $database);


?>
