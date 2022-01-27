<!DOCTYPE html>
<html>

<head>

   <meta charset="UTF-8">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css" />


</head>
<!--Contenue du site-->

<body>

   <section id="header">
      <section id="nav">
         <!--Header-->
         <header class="container-fluid header">
            <div class="container">
               <a href="" class="logo"></a>
               <nav class="menu">
                  <img src="riviera_logo.png" alt="Logo de Aix les bains Riviera" />
                  <a href="index.php"> Acceuil </a>
                  <a href=""> Plan </a>
                  <a href=""> Connection </a>
               </nav>
            </div>
         </header>
         <br>
      </section>


      <!--bannière-->
      <section id="banner">
         <div class="ban">

         </div>
         <div class="inner-banner">
            <h1> Riviera Loc</h1>
            <h2>La location de logements autour du lac du Bourget</h2>
         </div>
      </section>
<?php

require_once 'connect.php';
    if (
        isset($_POST['logement']) && !empty($_POST['logement']) &&
        isset($_POST['lits'])  && !empty($_POST['lits']) &&
        isset($_POST['wifi'])  && !empty($_POST['wifi'])  &&
        isset($_POST['parking'])  && !empty($_POST['parking']) &&
        isset($_POST['description'])  && !empty($_POST['description']) &&
        isset($_POST['contact'])  && !empty($_POST['contact'])
        
    ) {

       
        try {
            

            $sth = $dbco->prepare("
        UPDATE locations
        SET 
        logement = :Logement,
        Lits = :Lits,
        Wifi = :Wifi,
        Parking = :Parking,
        Description = :Description,
        Contact = :Contact
        WHERE Id_quest =:Modif
        ");

        /* virgule après chaque entrée sauf la derniere*/

        
            $logement = $_POST['logement'];
            $lits = $_POST['lits'];
            $wifi = $_POST['wifi'];
            $parking = $_POST['parking'];
            $description = $_POST['description'];
            $contact = $_POST['contact'];
            
            $sth->bindParam(':Logement', $logement);
            $sth->bindParam(':Lits', $lits);
            $sth->bindParam(':Wifi', $wifi);
            $sth->bindParam(':Parking', $parking);
            $sth->bindParam(':Description', $description);
            $sth->bindParam(':Contact', $contact);
            $sth->bindParam(':Modif', $_GET['locations']);
            
            
            /* $_GET le nom de la table*/
           
            $sth->execute();
            echo 'Logement mis à jour !';
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ?>
    <?php

    
    try {
       
        $sth = $dbco->prepare(" SELECT * FROM Locations WHERE Id_quest=:Modif");
        $sth->bindParam(':Modif', $_GET['locations']);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
   

    ?>

    <section id="formulaire_edition">
    <h2 id="logement_title">Modifier Logement</h2>

        <br>

        <form action="" method="post">
            <div class="c100">
                <label for="logement">Logement : </label>
                <input type="text" id="logement" name="logement" value="<?php echo $result['Logement']; ?>">
            </div>
            <br>
            <div class="c100">
                <label for="lits">Lits : </label>
                <input type="number" id="lits" name="lits" value="<?php echo $result['Lits']; ?>">
            </div>
            <div class="c100">
                <label for="wifi">Wifi : </label>
                <input type="text" id="wifi" name="wifi" value="<?php echo $result['Wifi']; ?>">
            </div>
            <br>
            <div class="c100">
                <label for="parking">Parking : </label>
                <input type="text" id="parking" name="parking" value="<?php echo $result['Parking']; ?>">
            </div>
            <div class="c100">
                <label for="description">Description : </label>
                <input type="text" id="description" name="description" value="<?php echo $result['Description']; ?>">
            </div>
            <br>
            <div class="c100">
                <label for="contact">Contact : </label>
                <input type="text" id="contact" name="contact" value="<?php echo $result['Contact']; ?>">
            </div>
            <br>
            <div class="varicelle2" id="submit">
                <input type="submit" value=Modifier button type="button" class="btn btn-warning">
                <a href="index.php"> <button type="button" class="btn btn-primary">Retour Tableau de Bord</button></a><br>
            </div>
    </section>
    </form>

    </body>

</html>

 <!--Footer-->
 <section id="footer">

<footer>

   <p class="logos">
      <a href="https://grand-lac.fr/" target="_blank">
         <img src="logo_grand_lac.png" alt="Logo Grand lac" />
      </a>

      <a href="https://www.savoiegrandrevard.com/hiver" target="_blank">
         <img src="logo_revard.png" alt="Logo Grand Revard" />
      </a>

   <ul>
      <a href="cgv_cgu.html">
         <li>CGV/CGU</li>
      </a>
      <a href="politique.html">
         <li>Politique de Confidentialité</li>
      </a>
      <a href="mailto:revieraloc@gmail.com">
         <li>revieraloc@gmail.com</li>
      </a>
      <br>
      <li>Copyright © 2022 Riviera Loc. Tous droits réservés.</li>
   </ul>

   </p>
</footer>




</section>
</section>

</section>


<br>


</body>



</html>