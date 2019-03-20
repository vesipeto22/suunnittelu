<?php
/*
Ohjelma ottaa yhteyden tietokantaan
@author Antti H
@date 20.2.2019
*/


$host = "magnesium"; //tietokantaympäristö (jos et tiedä kokeile localhost)
$user = "17bahilden"; //käyttäjätunus
$pass ="salasana"; //salasana
$dbname = "sk17bahilden"; //skeema

try {
	$yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass); 
} 
catch(PDOException $e) { //jos ei toimi
	echo $e->getMessage(); 
}
?>