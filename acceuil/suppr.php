<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suprimmer</title>
</head>

<body>
    <?php

    require_once 'connect.php';

    if (isset($_GET['logement']) && !empty($_GET['logement'])) {
    }
    try {

        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
        DELETE FROM file WHERE id_location= :Logement");
        $sth->bindParam(':Logement', $_GET['locations']);
        $sth->execute();


        $sth = $dbco->prepare("
            DELETE FROM Locations WHERE Id_quest= :Logement");
        $sth->bindParam(':Logement', $_GET['locations']);
        $sth->execute();






        print('Supprimé');
        header('location: index.php');
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    //");

    ?>
</body>

</html>