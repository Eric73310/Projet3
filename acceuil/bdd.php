<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=gites', 'root', '');
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
    die('Erreur sur la base de données : '.$e->getMessage());
}