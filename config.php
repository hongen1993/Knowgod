<?Php
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
define('DBUSER','root');
define('DBPWD','');
define('DBHOST','localhost');
define('DBNAME','login');

$dbhost_name = "localhost";
$database = "login"; // Change your database name
$username = "root";          // Your database user id
$password = "";          // Your password

//////// Do not Edit below /////////
try {
$dbo=new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$conn = mysqli_connect($dbhost_name, $username, $password, $database);


?>
