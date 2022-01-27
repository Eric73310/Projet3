<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try{
        $servname = 'localhost';
        $dbname = 'gites';
        $user = 'root';
        $pass = '';



$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tri = "SELECT * From Locations ";
$sth = $dbco->prepare($tri);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['result']=$result;


    
    }

catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}
    ?>
</body>
</html>