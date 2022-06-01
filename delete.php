<?php 

//nastavuje připojení
$connection = new mysqli("localhost", "root", "", "videohry");

//ověřuje jestli je připojení stabilní
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//query pro vytažení všech dat z tabulky
$sqlQ = "delete from videohryTable where id = '$_GET[id]'";
if(mysqli_query($connection,$sqlQ)){header("refresh:1; url=videogames.php");};
?>