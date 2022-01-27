<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style1.css">
    <meta charset="utf-8" />

</head>

<body>


    <h1>Ajouter des logements</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="c100">
            <label for="logement">Logement : </label>
            <input type="text" id="logement" name="logement" required>
        </div>
        <div class="c100">
            <label for="lits">Lits : </label>
            <input type="number" id="lits" name="lits" required>
        </div>
        <div class="c100">
            <label for="wifi">Wifi : </label>
            <input type="text" id="wifi" name="wifi" required>
        </div>
        <div class="c100">
            <label for="parking">Parking : </label>
            <input type="text" id="parking" name="parking" required>
        </div>
        <div class="c100">
            <label for="description">Description : </label>
            <input type="text" id="description" name="description" required>
        </div>
        <div class="c100">
            <label for="contact">Contact : </label>
            <input type="text" id="contact" name="contact" required>
        </div>
        <div class="c100">
            <label for="file">Fichier :</label>
            <input type="file" name="file[]" multiple>

        </div>
        <div class="c100" id="submit">
            <input type="submit" name="LogementSubmit" value="Ajouter un logement">
        </div>

    </form>


</body>

</html>

<?php
require './bdd.php';
//* bouclette
if (
    isset($_POST['logement']) && !empty($_POST['logement']) &&
    isset($_POST['lits'])  && !empty($_POST['lits']) &&
    isset($_POST['wifi'])  && !empty($_POST['wifi']) &&
    isset($_POST['parking'])  && !empty($_POST['parking']) &&
    isset($_POST['description'])  && !empty($_POST['description']) &&
    isset($_POST['contact'])  && !empty($_POST['contact'])
) {


    try {


        $sth = $db->prepare("
INSERT INTO Locations (Logement, Lits, Wifi, Parking, Description, Contact)
VALUES (:Logement, :Lits, :Wifi, :Parking, :Description, :Contact)
");
        $sth->bindParam(':Logement', $logement);
        $sth->bindParam(':Lits', $lits);
        $sth->bindParam(':Wifi', $wifi);
        $sth->bindParam(':Parking', $parking);
        $sth->bindParam(':Description', $description);
        $sth->bindParam(':Contact', $contact);

        $logement = $_POST['logement'];
        $lits = $_POST['lits'];
        $wifi = $_POST['wifi'];
        $parking = $_POST['parking'];
        $description = $_POST['description'];
        $contact = $_POST['contact'];
        $sth->execute();
        echo 'Stephane Plaza !';
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

require './upload_images.php';
?>