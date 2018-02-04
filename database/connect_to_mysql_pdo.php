<?php
/*** mysql hostname ***/
$db_hostname = 'localhost';

/*** mysql database name ***/
$db_dbname   = 'stock';

/*** mysql username ***/
$db_username = 'root';

/*** mysql password ***/
$db_password = '927640';

/*** mysql database charset ***/
$db_charset = 'utf8';

/***
$dsn = "mysql:host=$db_hostname;dbname=$db_dbname;charset=$db_charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dbh = new PDO($dsn, $user, $pass, $opt); ***/
// Create connection
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

try {
    $dbh = new PDO("mysql:host=$db_hostname;dbname=$db_dbname", $db_username, $db_password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }
catch(PDOException $e)
    {
    echo "Error!:". $e->getMessage() . "<br/>";
    die();
    }
 ?>