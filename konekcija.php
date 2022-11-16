<?php

$konekcija = new mysqli("localhost","root","","nekretnine");


if($konekcija-> connect_errno){
    printf("Connection error: %s\n", $mysqli->connect_error);
    exit();
}

?>
