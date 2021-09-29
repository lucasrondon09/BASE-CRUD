<?php

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "base_crud";

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_error){
    
    die("Não foi possível conectar ao banco de dados!".$mysqli->connect_error);
    exit();
    
}

