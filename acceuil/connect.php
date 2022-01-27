<?php


try {
    $dbco = new PDO('mysql:host=localhost;dbname=gites','root');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

?>
