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
                  <a href="add_logement.php"> Ajout </a>
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

      

      <section id="contenu">
         


            <section id="resultat_recherche">
               <?php

               include 'dynamik.php';
               for ($i = 0; $i <= count($_SESSION['result']) - 1; $i++) {


                  echo '<div class="container_logements">
                  <h3>Logement ' . ($i + 1) . '</h3>';
                  echo "Logement :" . $_SESSION['result'][$i]['Logement'] . '<br>';
                  echo "Lits :" . $_SESSION['result'][$i]['Lits'] . '<br>';
                  echo "Wifi :" . $_SESSION['result'][$i]['Wifi'] . '<br>';
                  echo "Parking :" . $_SESSION['result'][$i]['Parking'] . '<br>';
                  echo "Description :" . $_SESSION['result'][$i]['Description'] . '<br>';
                  echo "Contact :" . $_SESSION['result'][$i]['Contact'] . '<br>';
                  echo '<a href="show.php?locations=' . $_SESSION['result'][$i]['Id_quest'] . '"><button type="button">Voir</button></a></div>';
                  echo '<a href="modif.php?locations=' . $_SESSION['result'][$i]['Id_quest'] . '"><button type="button">Editer</button></a></div>';
                  echo '<a href="suppr.php?locations=' . $_SESSION['result'][$i]['Id_quest'] . '"><button type="submit" class="btn btn-danger btn-sm">Supprimer</button>' . '<br></a></div>';
               }
               ?>

            </section>


         </form>
      </section>
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